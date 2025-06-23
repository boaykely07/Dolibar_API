<?php require_once(__DIR__ . '/header.php'); ?>

<h1>Tableau de Bord</h1>

<div class="stats-container">
    <div class="stat-card">
        <h2>Total Tickets</h2>
        <p><?= $stats['total'] ?? 0 ?></p>
    </div>
    <div class="stat-card success">
        <h2>Tickets en Cours</h2>
        <p><?= $stats['in_progress'] ?? 0 ?></p>
    </div>
    <div class="stat-card resolved">
        <h2>Tickets Résolus</h2>
        <p><?= $stats['resolved'] ?? 0 ?></p>
    </div>
    <?php if (isset($stats['other']) && $stats['other'] > 0): ?>
    <div class="stat-card other">
        <h2>Autres</h2>
        <p><?= $stats['other'] ?></p>
    </div>
    <?php endif; ?>
</div>

<style>
.stats-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-top: 20px;
}
.stat-card {
    background: #fff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    padding: 25px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}
.stat-card h2 {
    margin-top: 0;
    font-size: 1.1rem;
    font-weight: 500;
    color: #6c757d;
}
.stat-card p {
    font-size: 2.8rem;
    font-weight: bold;
    margin-bottom: 0;
    color: #007bff;
}
.stat-card.success p { color: #28a745; }
.stat-card.resolved p { color: #ffc107; }
.stat-card.other p { color: #6c757d; }
</style>

