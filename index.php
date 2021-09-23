<?php include "html/header.php"; ?>

<div class="main-section">
  <div class="add-section rnd-brdr">
    <form action="">
      <input type="text" name="title" class="rnd-brdr" placeholder="Add a todo..." />
      <button type="submit" class="rnd-brdr">
        Add
        <i class="far fa-plus-square"></i>
      </button>
    </form>
  </div>

  <?php
  $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
  ?>

  <div class="show-todo-section rnd-brdr">
    <?php if ($todos->rowCount() <= 0) { ?>
      <div class="todo-item rnd-brdr">
        <div class="empty rnd-brdr">
          <img src="img/todo-img.webp" alt="todo">
          <img src="img/dots.gif" alt="dots" id="dots">
        </div>
      </div>
    <?php } ?>

    <?php while ($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="todo-item rnd-brdr">
        <input type="checkbox">
        <h2>This is a todo item</h2>
        <br>
        <small>Created: 09/23/2021</small>
      </div>
    <?php } ?>
  </div>
</div>

<?php include "html/footer.php"; ?>
