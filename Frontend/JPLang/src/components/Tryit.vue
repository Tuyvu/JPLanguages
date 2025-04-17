 <template>
    <!-- tryit -->
    <section id="tryit" class="mt-4">
      <div class="accordion" id="tryitAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tryitCollapse" aria-expanded="false" aria-controls="tryitCollapse">
              <i class="icn"><img src="https://www3.nhk.or.jp/nhkworld/lesson/assets/images/icn_tryit.png" alt=""></i> Thực hành
            </button>
          </h2>
          <div id="tryitCollapse" class="accordion-collapse collapse" data-bs-parent="#tryitAccordion">
            <div class="accordion-body">
              <h2>Bạn hãy thử tự giới thiệu về mình</h2>
              <div class="quiz-box">
                <p class="quiz-title"><i>1</i> Để nói câu sau bằng tiếng Nhật, trong 3 đáp án, đáp án nào là đúng?</p>
                <div class="question-box">
                  <p>Xin chào. Tôi là Thomas. Tôi là nhân viên công ty.</p>
                  <div class="row">
                    <div class="col-md-6">
                      <p>Thomas | nhân viên công ty</p>
                      <p><em lang="ja">トーマス | 会社員</em></p>
                      <p>Toomasu | kaishain</p>
                    </div>
                    <div class="col-md-6">
                      <figure><img src="https://www3.nhk.or.jp/nhkworld/lesson/assets/images/lessons/02/tryit_fig_01.png" alt="" class="img-fluid"></figure>
                    </div>
                  </div>
                </div>
                <ul class="answer-list">
                  <li>
                    <input type="radio" name="lesson01" id="lesson01-a1" class="incorrect">
                    <label for="lesson01-a1">
                      <span class="num">1</span>
                      <div>
                        <p>Hajimemashite. Toomasu desu ka. Kaishain desu ka.</p>
                        <p class="answer d-none">Tiếc quá. Sai rồi.</p>
                      </div>
                    </label>
                  </li>
                  <li>
                    <input type="radio" name="lesson01" id="lesson01-a2" class="correct">
                    <label for="lesson01-a2">
                      <span class="num">2</span>
                      <div>
                        <p class="answer d-none"><em lang="ja">はじめまして。トーマスです。会社員です。</em></p>
                        <p>Hajimemashite. Toomasu desu. Kaishain desu.</p>
                      </div>
                      <i class="icn-play d-none" id="correct-player"></i>
                    </label>
                  </li>
                  <li>
                    <input type="radio" name="lesson01" id="lesson01-a3" class="incorrect">
                    <label for="lesson01-a3">
                      <span class="num">3</span>
                      <div>
                        <p>Hajimemashite. Toomasu deshita. Kaishain deshita.</p>
                        <p class="answer d-none">Tiếc quá. Sai rồi.</p>
                      </div>
                    </label>
                  </li>
                </ul>
              </div>
              <!-- Repeat for other quiz items -->
              <nav class="pagenation-s">
                <ul class="d-flex justify-content-between">
                  <li class="prev-btn"><a href="https://www3.nhk.or.jp/nhkworld/lesson/vi/lessons/01.html#tryit" class="btn btn-outline-primary"><i class="arrow"></i> #1</a></li>
                  <li class="next-btn"><a href="https://www3.nhk.or.jp/nhkworld/lesson/vi/lessons/03.html#tryit" class="btn btn-outline-primary">#3 <i class="arrow"></i></a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
        <!-- tryit -->
 </template>
 
 <style scoped>
 .accordion-button i.icn img {
     width: 24px;
     height: 24px;
     margin-right: 8px;
 }

 .session-box {
     display: flex;
     align-items: center;
     margin-bottom: 15px;
 }

 .session-box figure {
     margin-right: 15px;
 }

 .session-box figure img {
     width: 50px;
     height: 50px;
 }

 .text-box {
     flex-grow: 1;
     padding: 10px;
     border: 1px solid #ddd;
     border-radius: 5px;
     position: relative;
 }

 .icn-play::before {
     content: '▶';
     position: absolute;
     right: 10px;
     top: 50%;
     transform: translateY(-50%);
     font-size: 20px;
 }

 .module-modal {
     margin-left: 10px;
 }

 .module-modal p {
     display: flex;
     align-items: center;
 }

 .module-modal img {
     width: 24px;
     height: 24px;
     margin-left: 5px;
 }

 .pagenation-s ul {
     display: flex;
     justify-content: space-between;
     list-style: none;
     padding: 0;
 }

 .chara-text {
     display: flex;
     align-items: center;
     background: #f8f9fa;
     padding: 10px;
     border-radius: 5px;
 }

 .chara-text img {
     width: 40px;
     height: 40px;
     margin-right: 10px;
 }

 .column3,
 .column1 {
     display: flex;
     justify-content: space-around;
     margin-bottom: 15px;
 }

 .column3 div,
 .column1 {
     text-align: center;
 }

 .quiz-box {
     margin-bottom: 20px;
 }

 .answer-list li {
     margin-bottom: 10px;
 }

 .answer-list label {
     display: flex;
     align-items: center;
 }

 .answer-list .num {
     margin-right: 10px;
 }

 .more-block ul {
     list-style: none;
     padding: 0;
 }

 .more-block li {
     margin-bottom: 10px;
 }

 .more-block .arrow::before {
     content: '→';
     margin-left: 5px;
 }

</style>