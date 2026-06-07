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
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">

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
        .sidebar-brand-text {
            font-family: 'Cormorant Garamond', serif !important;
            font-size: 17px !important;
            font-weight: 600 !important;
            letter-spacing: 0.02em;
            color: #fff !important;
            line-height: 1.2;
        }
        .sidebar-brand-text small {
            display: block;
            font-family: 'DM Sans', sans-serif;
            font-size: 9px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            font-weight: 300;
            margin-top: 2px;
        }
        .sidebar-brand-icon { display: none; }

        /* nav links */
        .sidebar .nav-item .nav-link {
            color: rgba(255,255,255,0.50) !important;
            font-size: 11.5px;
            letter-spacing: 0.06em;
            padding: 10px 20px;
            transition: color 0.2s, background 0.2s;
        }
        .sidebar .nav-item .nav-link:hover,
        .sidebar .nav-item.active .nav-link {
            color: #fff !important;
            background: rgba(255,255,255,0.07) !important;
        }
        .sidebar .nav-item .nav-link i {
            color: rgba(255,255,255,0.35) !important;
            font-size: 12px;
        }
        .sidebar .nav-item.active .nav-link i,
        .sidebar .nav-item .nav-link:hover i { color: rgba(255,255,255,0.8) !important; }

        /* section label */
        .sidebar-heading {
            font-size: 9px !important;
            letter-spacing: 0.22em !important;
            color: rgba(255,255,255,0.25) !important;
            padding: 14px 20px 6px !important;
        }
        .sidebar hr.sidebar-divider {
            border-top: 1px solid rgba(255,255,255,0.07) !important;
            margin: 6px 16px !important;
        }

        /* ── TOPBAR ── */
        .topbar {
            background: #fff !important;
            border-bottom: 1px solid rgba(13,13,13,0.10) !important;
            box-shadow: none !important;
            height: 56px;
        }
        .topbar .navbar-nav .nav-link { color: #555 !important; }
        .topbar .topbar-divider { border-right: 1px solid rgba(13,13,13,0.10); }
        .topbar .dropdown-item { font-size: 13px; color: #333; }
        .topbar .dropdown-item i { color: #999; }
        .topbar .img-profile { border: 1px solid rgba(13,13,13,0.15); }

        /* ── CONTENT AREA ── */
        #content-wrapper { background: #f5f4f0 !important; }
        #content { padding: 20px 28px; }

        /* ── CARDS ── */
        .card {
            border: 1px solid rgba(13,13,13,0.10) !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            background: #fff;
        }
        .card-header {
            background: #fff !important;
            border-bottom: 1px solid rgba(13,13,13,0.10) !important;
            font-size: 10.5px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(13,13,13,0.55);
            font-weight: 500;
            padding: 14px 20px;
        }

        /* stat cards */
        .stat-card {
            border-top: 2px solid #0d0d0d !important;
            padding: 20px 22px;
        }
        .stat-card .stat-label {
            font-size: 9.5px;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(13,13,13,0.40);
            margin-bottom: 6px;
        }
        .stat-card .stat-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            font-weight: 600;
            line-height: 1;
            letter-spacing: -0.02em;
            color: #0d0d0d;
        }
        .stat-card .stat-icon {
            width: 40px; height: 40px;
            background: rgba(13,13,13,0.05);
            display: flex; align-items: center; justify-content: center;
            float: right;
            margin-top: -4px;
        }
        .stat-card .stat-icon i { color: rgba(13,13,13,0.30); font-size: 16px; }
        .stat-card .stat-sub {
            font-size: 10.5px;
            color: rgba(13,13,13,0.40);
            margin-top: 8px;
            letter-spacing: 0.04em;
        }

        /* ── TABLE ── */
        .table thead th {
            font-size: 9.5px;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            color: rgba(13,13,13,0.40);
            font-weight: 400;
            border-bottom: 1px solid rgba(13,13,13,0.10);
            border-top: none;
            padding: 10px 16px;
            background: #fafaf8;
        }
        .table td {
            font-size: 12.5px;
            color: rgba(13,13,13,0.70);
            border-color: rgba(13,13,13,0.07);
            padding: 11px 16px;
            vertical-align: middle;
        }
        .table tbody tr:hover td { background: rgba(13,13,13,0.025); }

        /* status pills */
        .pill {
            display: inline-block;
            padding: 3px 9px;
            font-size: 10px;
            letter-spacing: 0.06em;
            font-weight: 500;
        }
        .pill-draft    { background: rgba(13,13,13,0.07); color: rgba(13,13,13,0.45); }
        .pill-dikirim  { background: rgba(26,58,106,0.10); color: #1a3a6a; }
        .pill-selesai  { background: rgba(26,102,64,0.10); color: #1a6640; }
        .pill-batal    { background: rgba(122,26,26,0.10); color: #7a1a1a; }

        /* ── QUICK ACCESS ── */
        .quick-btn {
            display: block;
            background: #fff;
            border: 1px solid rgba(13,13,13,0.10);
            border-radius: 0;
            padding: 14px 16px;
            text-decoration: none;
            color: #0d0d0d;
            transition: background 0.2s, border-color 0.2s;
            margin-bottom: 8px;
        }
        .quick-btn:hover { background: #0d0d0d; color: #fff; text-decoration: none; }
        .quick-btn:hover i { color: rgba(255,255,255,0.7) !important; }
        .quick-btn:hover .quick-desc { color: rgba(255,255,255,0.5); }
        .quick-btn i { color: rgba(13,13,13,0.35); font-size: 13px; margin-right: 10px; }
        .quick-title { font-size: 12px; font-weight: 500; }
        .quick-desc  { font-size: 10.5px; color: rgba(13,13,13,0.40); margin-top: 1px; letter-spacing: 0.02em; }

        /* ── STATUS BARS ── */
        .status-bar-item { margin-bottom: 14px; }
        .status-bar-header {
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: rgba(13,13,13,0.60);
            margin-bottom: 5px;
        }
        .status-bar-header strong { color: #0d0d0d; font-size: 12px; }
        .status-bar-track {
            height: 3px;
            background: rgba(13,13,13,0.08);
            overflow: hidden;
        }
        .status-bar-fill { height: 100%; background: #0d0d0d; }

        /* page title */
        .page-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 600;
            letter-spacing: -0.01em;
            color: #0d0d0d;
            margin: 0;
            line-height: 1;
        }
        .page-sub {
            font-size: 11px;
            color: rgba(13,13,13,0.40);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 20px;
            margin-top: 3px;
        }
    </style>
</head>
<body id="page-top">
    <div id="wrapper">