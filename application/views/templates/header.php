<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PT Maju Jaya – Sales Order</title>

    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

    <style>
        /* ── GLOBAL ── */
        body { font-family: 'DM Sans', sans-serif; background: #f5f4f0; }

        /* ── SIDEBAR ── */
        .sidebar {
            background: #0d0d0d !important;
            background-image: none !important;
        }
        .sidebar .sidebar-brand {
            background: #0d0d0d !important;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            padding: 20px 16px;
        }
        .sidebar-brand-icon { display: none !important; }
        .sidebar-brand-text {
            font-size: 18px !important;
            font-weight: 500 !important;
            letter-spacing: -0.01em;
            color: #fff !important;
            line-height: 1.2;
        }
        .sidebar-brand-text small {
            display: block;
            font-size: 9px;
            font-weight: 300;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.35);
            margin-top: 4px;
        }

        /* nav links */
        .sidebar .nav-item .nav-link {
            color: rgba(255,255,255,0.50) !important;
            font-size: 12px;
            font-weight: 400;
            letter-spacing: 0.01em;
            padding: 10px 20px;
            transition: color 0.18s, background 0.18s;
        }
        .sidebar .nav-item .nav-link i {
            color: rgba(255,255,255,0.30) !important;
            font-size: 12px;
        }
        .sidebar .nav-item .nav-link:hover {
            color: #fff !important;
            background: rgba(255,255,255,0.07) !important;
        }
        .sidebar .nav-item .nav-link:hover i { color: rgba(255,255,255,0.70) !important; }
        .sidebar .nav-item.active .nav-link {
            color: #fff !important;
            background: rgba(255,255,255,0.10) !important;
            font-weight: 500;
        }
        .sidebar .nav-item.active .nav-link i { color: rgba(255,255,255,0.80) !important; }

        .sidebar-heading {
            font-size: 9px !important;
            letter-spacing: 0.20em !important;
            color: rgba(255,255,255,0.25) !important;
            padding: 14px 20px 5px !important;
            font-weight: 400 !important;
        }
        .sidebar hr.sidebar-divider {
            border-top: 1px solid rgba(255,255,255,0.07) !important;
            margin: 6px 16px !important;
        }

        /* ── TOPBAR ── */
        .topbar {
            background: #ffffff !important;
            border-bottom: 1px solid rgba(13,13,13,0.10) !important;
            box-shadow: none !important;
            height: 56px;
        }
        .topbar .navbar-nav .nav-link { color: #555 !important; }
        .topbar .topbar-divider { border-right: 1px solid rgba(13,13,13,0.10); }
        .topbar .img-profile { border: 1px solid rgba(13,13,13,0.12); }
        .topbar .dropdown-menu {
            border: 1px solid rgba(13,13,13,0.10);
            border-radius: 0;
            box-shadow: 0 4px 16px rgba(13,13,13,0.08);
        }
        .topbar .dropdown-item { font-size: 13px; color: #333; }
        .topbar .dropdown-item:hover { background: #f5f4f0; }

        /* ── CONTENT ── */
        #content-wrapper { background: #f5f4f0 !important; }
        #content { padding: 24px 28px; }

        /* ── PAGE TITLE ── */
        .page-title {
            font-size: 20px;
            font-weight: 500;
            color: #0d0d0d;
            margin: 0 0 4px;
            letter-spacing: -0.01em;
        }
        .page-sub {
            font-size: 10px;
            color: rgba(13,13,13,0.40);
            letter-spacing: 0.14em;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        /* ── CARDS (general) ── */
        .card {
            border: 1px solid rgba(13,13,13,0.10) !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            background: #fff;
        }
        .card-header {
            background: #fff !important;
            border-bottom: 1px solid rgba(13,13,13,0.10) !important;
            padding: 14px 20px;
            font-size: 10px;
            font-weight: 400;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(13,13,13,0.50);
        }

        /* ── STAT CARDS ── */
        .stat-card {
            border-top: 2px solid #0d0d0d !important;
            padding: 20px 22px;
            transition: box-shadow 0.2s;
        }
        .stat-card:hover {
            box-shadow: 0 4px 20px rgba(13,13,13,0.08) !important;
        }
        .stat-icon {
            width: 38px; height: 38px;
            background: rgba(13,13,13,0.05);
            display: flex; align-items: center; justify-content: center;
            float: right;
        }
        .stat-icon i { color: rgba(13,13,13,0.28); font-size: 15px; }
        .stat-label {
            font-size: 9.5px;
            font-weight: 400;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(13,13,13,0.40);
            margin-bottom: 6px;
        }
        .stat-number {
            font-size: 40px;
            font-weight: 300;
            line-height: 1;
            letter-spacing: -0.02em;
            color: #0d0d0d;
            margin-bottom: 6px;
        }
        .stat-sub {
            font-size: 11px;
            color: rgba(13,13,13,0.35);
        }

        /* ── TABLE ── */
        .table thead th {
            font-size: 9.5px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(13,13,13,0.38);
            font-weight: 400;
            border-top: none;
            border-bottom: 1px solid rgba(13,13,13,0.10);
            padding: 10px 16px;
            background: #fafaf8;
        }
        .table td {
            font-size: 12.5px;
            color: rgba(13,13,13,0.68);
            border-color: rgba(13,13,13,0.06);
            padding: 11px 16px;
            vertical-align: middle;
        }
        .table tbody tr:hover td { background: rgba(13,13,13,0.02); }

        /* status pills */
        .pill {
            display: inline-block;
            padding: 3px 9px;
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.04em;
        }
        .pill-draft    { background: rgba(13,13,13,0.06); color: rgba(13,13,13,0.40); }
        .pill-dikirim  { background: rgba(13,13,13,0.06); color: rgba(13,13,13,0.65); }
        .pill-selesai  { background: rgba(13,13,13,0.08); color: rgba(13,13,13,0.80); }
        .pill-batal    { background: rgba(122,26,26,0.08); color: #7a1a1a; }

        /* ── STATUS BARS ── */
        .status-bar-item { margin-bottom: 14px; }
        .status-bar-header {
            display: flex;
            justify-content: space-between;
            font-size: 11.5px;
            color: rgba(13,13,13,0.55);
            margin-bottom: 6px;
        }
        .status-bar-header strong { color: #0d0d0d; font-weight: 500; }
        .status-bar-track {
            height: 2px;
            background: rgba(13,13,13,0.08);
            overflow: hidden;
        }
        .status-bar-fill { height: 100%; background: #0d0d0d; }

        /* ── QUICK BUTTONS ── */
        .quick-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #fff;
            border: 1px solid rgba(13,13,13,0.10);
            border-radius: 0;
            padding: 12px 14px;
            text-decoration: none;
            color: #0d0d0d;
            margin-bottom: 8px;
            transition: background 0.18s, color 0.18s;
        }
        .quick-btn:hover {
            background: #0d0d0d;
            color: #fff;
            text-decoration: none;
        }
        .quick-btn:hover .quick-icon { background: rgba(255,255,255,0.10); }
        .quick-btn:hover .quick-icon i { color: rgba(255,255,255,0.70) !important; }
        .quick-btn:hover .quick-desc { color: rgba(255,255,255,0.45); }
        .quick-icon {
            width: 32px; height: 32px;
            background: rgba(13,13,13,0.05);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .quick-icon i { color: rgba(13,13,13,0.35); font-size: 13px; }
        .quick-texts { flex: 1; }
        .quick-title { font-size: 12.5px; font-weight: 500; display: block; line-height: 1.2; }
        .quick-desc  { font-size: 11px; color: rgba(13,13,13,0.38); margin: 0; }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">