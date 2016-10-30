<?php include '../view/header.php'; ?>
<nav>
                 <a href="/vintage_autos/index.php">Home</a>
                 
            </nav>
             </header>
<div id="main">
    <h1>Database Error</h1>
    <p class="first_paragraph">There was an error connecting to the database.</p>
    <p class="last_paragraph">Error message: <?php echo $error_message; ?></p>
</div><!-- end main -->
<?php include_once '../view/footer.php'; ?>