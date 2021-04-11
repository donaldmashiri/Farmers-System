  <!-- Footer -->
  <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">
                   

                    <div class="col-lg text-center text-lg-right">
                        &copy; 2019 Graindashboard. All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </main>


    <script src="public/graindashboard/js/graindashboard.js"></script>
    <script src="public/graindashboard/js/graindashboard.vendor.js"></script>

    <!-- DEMO CHARTS -->
    <script src="public/demo/resizeSensor.js"></script>
    <script src="public/demo/chartist.js"></script>
    <script src="public/demo/chartist-plugin-tooltip.js"></script>
    <script src="public/demo/gd.chartist-area.js"></script>
    <script src="public/demo/gd.chartist-bar.js"></script>
    <script src="public/demo/gd.chartist-donut.js"></script>
    <script>
        $.GDCore.components.GDChartistArea.init('.js-area-chart');
        $.GDCore.components.GDChartistBar.init('.js-bar-chart');
        $.GDCore.components.GDChartistDonut.init('.js-donut-chart');
    </script>
</body>

</html>