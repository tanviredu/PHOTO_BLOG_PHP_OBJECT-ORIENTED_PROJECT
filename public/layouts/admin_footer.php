    </div>
    <div id="footer">Copyright <?php echo date("d-m-Y", time()); ?>, Tanvir Rahman</div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>