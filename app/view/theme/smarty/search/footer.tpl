    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="app/view/theme/smarty/assets/js/jquery.js"></script>
    <script src="app/view/theme/smarty/dist/js/bootstrap.min.js"></script>
    <script src="app/view/theme/smarty/js/typeahead.bundle.js"></script>
    <script src="app/view/theme/smarty/js/jquery.tokeninput.js"></script>
    {literal}
    <script type="text/javascript">
    $(document).ready(function () {
        $("#search-field").tokenInput("async/qcomplete");
    });
    </script>
    {/literal}
  </body>
</html>
