<section class="bg-pink py-9 position-relative overflow-hidden">
      <div class="container">
        <div class="row justify-content-center text-center mb-1">
          <div class="col-lg-6 col-md-10">
            <div class="mb-4">
              <h2 class="mb-0">Be the first and get weekly updates</h2>
            </div>
            <div class="subscribe-form">
              <form id="subscribe" class="row align-items-center no-gutters mb-3" action="javascript:void(0);">
                @csrf
                <div class="col">
                  <input value="" name="email" class="email form-control input-2 bg-white" id="subscribe_email" placeholder="Email Address" required type="email">
                </div>
                <div class="col-auto">
                  <input class="btn dark-btn overflow-auto" name="subscribe" value="Subscribe" type="submit">
                </div>
                
                
              </form>
            </div>
            <p class="subscribe_message" style="display: none;color: red;"></p>
          </div>
        </div>
      </div>
    </section>