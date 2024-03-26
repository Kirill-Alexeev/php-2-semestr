<!doctype html>
<html lang="ru">
    <head>
        <title>Notebook</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
              <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <?php if (isset($_GET['p']) && $_GET['p']=='view') echo '<li class="nav-item active">' ?>
                      <a class="nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'view') echo 'active' ?>" href="?p=view">View</a>
                    </li>
                    <?php if (isset($_GET['p']) && $_GET['p']=='add') echo '<li class="nav-item active">' ?>
                      <a class="nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'add') echo 'active' ?>" href="?p=add">Add</a>
                    </li>
                    <?php if (isset($_GET['p']) && $_GET['p']=='update') echo '<li class="nav-item active">' ?>
                      <a class="nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'update') echo 'active' ?>" href="?p=update">Update</a>
                    </li>
                    <?php if (isset($_GET['p']) && $_GET['p']=='delete') echo '<li class="nav-item active">' ?>
                      <a class="nav-link <?php if (isset($_GET['p']) && $_GET['p'] == 'delete') echo 'active' ?>" href="?p=delete">Delete</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
        </header>
        <main>
          <?php
          $o = isset($_GET['o']) ? $_GET['o'] : '';
          if ($_GET['p'] == 'view') : ?>
            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                <a href="?p=view&o=id" class="btn btn-secondary <?php echo ($o == 'id') ? 'active' : ''; ?>">Id</a>
                <a href="?p=view&o=date" class="btn btn-secondary <?php echo ($o == 'date') ? 'active' : ''; ?>">Date</a>
                <a href="?p=view&o=firstname" class="btn btn-secondary <?php echo ($o == 'firstname') ? 'active' : ''; ?>">Firstname</a>
            </div>
          <?php endif; ?>
        