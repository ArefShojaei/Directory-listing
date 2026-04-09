<?php defined("BASE_PATH") || die("Permission defined!")  ?>

</div>
<script>
  // View toggle (list ↔ grid)
  document.querySelectorAll(".view-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      document.querySelectorAll(".view-btn").forEach(b => {
        b.classList.remove("bg-cyan-600/80", "text-white");
        b.classList.add("text-cyan-300");
      });
      btn.classList.add("bg-cyan-600/80", "text-white");
      btn.classList.remove("text-cyan-300");

      const view = btn.dataset.view;
      document.querySelector(".list-view").classList.toggle("active", view === "list");
      document.querySelector(".list-view").classList.toggle("hidden", view !== "list");
      document.querySelector(".grid-view").classList.toggle("hidden", view !== "grid");
    });
  });
</script>

</body>
</html>