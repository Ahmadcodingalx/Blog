<header class="menu-bar">
    <table>
        <tr>
            <td>Blog</td>
            <td>
                <ul>
                    <li>
                        <a href="/Blog/index.php" class="<?= (!isset($_GET["page"]) ? "menu-active" : ""); ?>">Home</a>
                    </li>
                    <li>
                        <a href="/Blog/pages/articles.php?page=articles" class="<?= (isset($_GET["page"]) && $_GET["page"] == "articles" ? "menu-active" : ""); ?>">Article</a>
                    </li>
                    <li>
                        <a href="/Blog/pages/inscription.php?page=inscription" class="<?= (isset($_GET["page"]) && $_GET["page"] == "inscription" ? "menu-active" : ""); ?>">Inscription</a>
                    </li>
                    <li>
                        <a href="/Blog/pages/connexion.php?page=connexion" class="<?= (isset($_GET["page"]) && $_GET["page"] == "connexion" ? "menu-active" : ""); ?>">Connexion</a>
                    </li>
                </ul>
            </td>
        </tr>
    </table>
</header>