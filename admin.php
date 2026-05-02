<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['portfolio'])) {
    $_SESSION['portofolio'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $techString = $_POST['tech'] ?? '';
    $techArray = array_map('trim', explode(',', $techString));

    if ($title && $description) {
        $_SESSION['portofolio'][] = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'image' => $_POST['image'],
            'repo' => $_POST['repo'],
            'demo' => $_POST['demo'],
            'tech' => $techArray,
        ];
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_index'])) {
    $deleteIndex = $_POST['delete_index'];
    if (isset($_SESSION['portofolio'])) {
        array_splice($_SESSION['portofolio'], $deleteIndex, 1);
    }
}

$title = "My Profile | Admin Page";
$page = "about";

include 'partial/meta.php';
include 'partial/nav.php';
?>

    <div class="section">
        <div class="container">
            <div class="section-title">
                <h2>Admin Panel</h2>
                <p>this page just can access after login, in here you can edit protofolio item, and will show in protofolio page</p>
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <h2>Add Portofolio item</h2>
        </div>
    </div>
    <div>
        <div class="container">
            <form action="admin.php" method="POST">
                <div class="input-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" require>
                </div>
                <div class="input-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description" require>
                </div>
                <div class="input-group">
                    <label for="tech">tech</label>
                    <input type="text" name="tech" id="tech" require>
                </div>
                <div class="input-group">
                    <label for="repo">Repository</label>
                    <input type="text" name="repo" id="repo" require>
                </div>
                <div class="input-group">
                    <label for="demo">Demo</label>
                    <input type="text" name="demo" id="demo" require>
                </div>
                <div class="input-group">
                    <label for="image">Image</label>
                    <input type="text" name="image" id="image" require>
                </div>
                <button type="submit" class="btn-submit">Add Portofolio</button>
            </form>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="section-title">
                <h2>List Portofolio</h2>
                <p>List of item portofolio</p>
            </div>

            <div class="table-wrapper">
                <table class="portofolio-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Tech</th>
                            <th>Repo</th>
                            <th>Demo</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['portofolio'] as $index => $item):?>
                            <tr>
                                <td><?php echo $index + 1;?></td>
                                <td><?php echo htmlspecialchars($item['title']);?></td>
                                <td><?php echo htmlspecialchars($item['description']);?></td>
                                <td>
                                    <?php 
                                    foreach ($item['tech'] as $t) {
                                        echo '<span class="badge-tech">' . htmlspecialchars($t) . '</span>';
                                    }
                                    ?>
                                </td>
                                <td><?php echo htmlspecialchars($item['repo']);?></td>
                                <td><?php echo htmlspecialchars($item['demo']);?></td>
                                <td><?php echo htmlspecialchars($item['image']);?></td>
                                <td>
                                    <form action="admin.php" method="POST">
                                        <input type="hidden" name="delete_index" value="<?php echo $index; ?>">
                                        <button type="submit" class="btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include 'partial/footer.php'?>