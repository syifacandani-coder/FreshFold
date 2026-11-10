<?php
require_once 'koneksi.php';
header('Content-Type: application/json');

// Mencegah error PHP tampil sebagai HTML di JSON
error_reporting(0);
ini_set('display_errors', 0);

$action = $_GET['action'] ?? '';

if ($action === 'get_data') {
    try {
        // 1. Ambil data pesanan (gunakan LEFT JOIN agar tidak crash saat tabel customers kosong)
        $stmtOrders = $pdo->query("
            SELECT o.id, o.order_code as id_str, 
                   COALESCE(c.name, 'Pelanggan') as name, 
                   COALESCE(c.phone, '-') as phone, 
                   COALESCE(s.service_name, 'Layanan') as service, 
                   o.weight, o.total_price as total, o.order_date as date, 
                   o.estimated_completion as due, o.status, 
                   COALESCE(p.payment_status, 'Belum Lunas') as payment
            FROM orders o
            LEFT JOIN customers c ON o.customer_id = c.id
            LEFT JOIN services s ON o.service_id = s.id
            LEFT JOIN payments p ON p.order_id = o.id
            ORDER BY o.id DESC
        ");
        $orders = $stmtOrders->fetchAll(PDO::FETCH_ASSOC);

        // 2. Ambil data layanan
        $stmtServices = $pdo->query("SELECT * FROM services");
        $services = $stmtServices->fetchAll(PDO::FETCH_ASSOC);

        // 3. Ambil data karyawan
        $stmtEmployees = $pdo->query("SELECT * FROM employees");
        $employees = $stmtEmployees->fetchAll(PDO::FETCH_ASSOC);

        // 4. Ambil data pelanggan
        $stmtCustomers = $pdo->query("SELECT * FROM customers ORDER BY name ASC");
        $customers = $stmtCustomers->fetchAll(PDO::FETCH_ASSOC);            

        echo json_encode([
            'success' => true,
            'orders' => $orders ?: [],
            'services' => $services ?: [],
            'employees' => $employees ?: [],
            'customers' => $customers ?: []
        ]);
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage(),
            'orders' => [],
            'employees' => []
        ]);
    }
    exit;
}

if ($action === 'add_order' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = (int)($_POST['customer_id'] ?? 0);
    $service_id  = (int)($_POST['service_id'] ?? 1);
    $weight = $_POST['weight'] ?? 0;
    $date   = $_POST['date'] ?? date('Y-m-d');
    $due    = $_POST['due'] ?? date('Y-m-d');
    $total  = $_POST['total'] ?? 0;
    $order_code = 'LD-' . str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

    if ($customer_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Pelanggan belum dipilih']);
        exit;
    }

    try {
        $pdo->beginTransaction();

        $stmtO = $pdo->prepare("INSERT INTO orders (order_code, customer_id, service_id, weight, total_price, order_date, estimated_completion, status) VALUES (?, ?, ?, ?, ?, ?, ?, 'Menunggu Proses')");
        $stmtO->execute([$order_code, $customer_id, $service_id, $weight, $total, $date, $due]);
        $order_id = $pdo->lastInsertId();

        $stmtP = $pdo->prepare("INSERT INTO payments (order_id, amount_paid, payment_status) VALUES (?, 0, 'Belum Lunas')");
        $stmtP->execute([$order_id]);

        $pdo->commit();
        echo json_encode(['success' => true, 'message' => "Pesanan $order_code berhasil dibuat!"]);
    } catch (Exception $e) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    exit;
}
if ($action === 'add_customer' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');

    if ($name === '' || $phone === '') {
        echo json_encode(['success' => false, 'message' => 'Nama dan nomor HP wajib diisi']);
        exit;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO customers (name, phone) VALUES (?, ?)");
        $stmt->execute([$name, $phone]);
        echo json_encode(['success' => true, 'message' => "Pelanggan $name berhasil ditambahkan!"]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
    exit;
}