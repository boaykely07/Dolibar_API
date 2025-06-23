<style>
    body { 
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
        margin: 0; 
        background-color: #f4f6f9;
    }
    .container { 
        padding: 20px;
        max-width: 1200px;
        margin: auto;
    }
    .navbar { 
        background: #ffffff; 
        color: #333; 
        padding: 0.8rem 1.5rem;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .navbar a { 
        color: #333; 
        text-decoration: none; 
        margin-right: 20px;
        font-weight: 500;
        font-size: 1rem;
    }
    .navbar a:hover { 
        color: #007bff;
    }
    .navbar .logo {
        font-weight: bold;
        font-size: 1.5rem;
    }
    .navbar .logout {
        color: #dc3545;
    }
</style>

<nav class="navbar">
    <div>
        <a href="#" class="logo">CRM</a>
        <a href="dashboard">Tableau de Bord</a>
        <a href="listeTickets">Liste des Tickets</a>
    </div>
    <div>
        <a href="/<?=BASE_URL?>/logout" class="logout">Déconnexion</a>
    </div>
</nav> 