<?php include "html/header.php"; ?>

<div class="main-section">
  <div class="add-section rnd-brdr">
    <form action="">
      <input type="text" name="title" class="rnd-brdr" placeholder="Add a todo..." />
      <button type="submit" class="rnd-brdr">
        Add &nbsp;
        <span>&#43;</span>
      </button>
    </form>
  </div>

  <?php
  $todos = $conn->query("SELECT * FROM todos ORDER BY id DESC");
  ?>

  <div class="show-todo-section rnd-brdr">
    <?php if ($todos->rowCount() > 0) { ?>
      <div class="todo-item rnd-brdr">
        <div class="empty rnd-brdr">
          <img src="img/todo-img.webp" alt="todo">
          <img src="img/dots.gif" alt="dots" id="dots">
        </div>
      </div>
    <?php } ?>


    <div class="todo-item rnd-brdr">
      <input type="checkbox">
      <h2>This is a todo item</h2>
      <br>
      <small>created: 09/23/2021</small>
    </div>
  </div>
</div>

<?php include "html/footer.php"; ?>
