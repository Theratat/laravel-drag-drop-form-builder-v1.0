@include('surveys.components.header')
<div class="container my-md-5 my-3">
    <div class="row align-items-center" style="height: 100vh;">
        <div class="col-md col-12 text-center mx-auto">
            <div class="mb-3">
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="d-flex m-0 fontSurveyThanks">ขอบคุณสำหรับการทำ<div class="text-gradient-primary">
                            แบบสำรวจ</div>
                    </h1>
                    <i class="fas fa-check-circle ms-2 fa-3x fontSurveyThanks" style="color: #06c755;"></i>
                </div>
                <p class="m-0">เราจะนำความคิดเห็นของคุณมาเพื่อพัฒนาร้านให้มีคุณภาพที่ดียิ่งขึ้น</p>

            </div>
            <div class="bg-surveyThanks">
                <img src="{{ asset('/assets/img/bg-surveyThanks.jpg') }}" width="50%" alt="">
            </div>
            <div class="mt-3">
                <p>ติดต่อสอบถามข้อมูลเพิ่มเติมได้ที่</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <a href=""><i class="fab fa-facebook-square fa-2x" style="color:#4267B2"></i></a>
                </div>
                <div class="col-auto">
                    <a href=""><i class="fab fa-twitter-square fa-2x" style="color: #1DA1F2;"></i></a>
                </div>
                <div class="col-auto">
                    <a href=""><i class="fab fa-line fa-2x" style="color: #06c755;"></i></a>
                </div>
            </div>
            <div class="mt-3">
                <p class="text-danger">คุณสามารถปิดหน้านี้ได้</p>
            </div>
        </div>
    </div>
</div>