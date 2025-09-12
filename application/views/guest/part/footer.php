<!-- =========================
         MODAL WELCOME (GANTI ISI)
         ========================= -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header" style="border: none;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body" style="text-align: center;">
            <h4>Selamat Datang Di <b>Pabrik Kreativitas</b></h4>
            <div style="background-color:#fff; border-radius:5px; padding:10px; margin-top:10px;">
                <p>Ini konten popup. Ganti dengan teks / HTML nyata.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- =========================
         FOOTER (GANTI PLACEHOLDERS)
         ========================= -->
    <footer class="bg-yellow footer-one" style="padding:30px 0; background:#f7b731; color:#fff; margin-top:30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4"><h4>Pabrik Kreativitas</h4><p>Visi singkat / deskripsi perusahaan.</p></div>
                <div class="col-md-2">
                    <h5>Company</h5>
                    <ul class="list-unstyled"><li><a href="#home">About Us</a></li></ul>
                </div>
                <div class="col-md-2">
                    <h5>Support</h5>
                    <ul class="list-unstyled"><li><a href="#">Help & Support</a></li></ul>
                </div>
                <div class="col-md-4">
                    <h5>Contact us</h5>
                    <ul class="list-unstyled">
                        <li><strong>Address:</strong> Jalan Contoh No.1</li>
                        <li><strong>Phone:</strong> 0812-345-678</li>
                        <li><strong>Email:</strong> <a href="mailto:info@pabrik.com">info@pabrik.com</a></li>
                    </ul>
                    <img src="<?= base_url("assets/")?>admin/assets/images/icon/logo.png" width="130" class="pull-right" alt="logo">
                </div>
            </div>
        </div>

        <div class="footer-one-alt" style="background:rgba(0,0,0,0.06); padding:12px 0; margin-top:10px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5"><p class="m-b-0 copyright">&copy; 2025 CV Pabrik Kreativitas. All Rights Reserved</p></div>
                    <div class="col-sm-7 text-right">
                        <ul class="list-inline" style="margin:0; padding:0; list-style:none;">
                            <li style="display:inline;margin-left:8px;"><a href="#"><i class="ion-social-facebook"></i></a></li>
                            <li style="display:inline;margin-left:8px;"><a href="#"><i class="ion-social-twitter"></i></a></li>
                            <li style="display:inline;margin-left:8px;"><a href="#"><i class="ion-social-instagram"></i></a></li>
                            <li style="display:inline;margin-left:8px;"><a href="mailto:info@pabrik.com"><i class="ion-email"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <a href="#" class="back-to-top" id="back-to-top"><i class="ion-chevron-up"></i></a>

    <!-- SCRIPTS (bootstrap + plugins) -->
    <script src="<?= base_url()?>assets/user_admin/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/user_admin/js/jquery.easing.1.3.min.js"></script>
    <script src="<?= base_url()?>assets/user_admin/js/owl.carousel.min.js"></script>
    <script src="<?= base_url()?>assets/user_admin/js/jquery.sticky.js"></script>
    <script src="<?= base_url()?>assets/user_admin/js/jquery.app.js"></script>

    <!-- Inisialisasi carousel + modal -->
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                autoplay: true,
                autoplayTimeout: 4000,
                responsive:{
                    0:{ items:1 }
                }
            });

            // Tampilkan modal saat load (hapus jika tidak ingin auto-show)
            $('#myModal').modal({ show: true });
        });
    </script>
</body>
</html>
