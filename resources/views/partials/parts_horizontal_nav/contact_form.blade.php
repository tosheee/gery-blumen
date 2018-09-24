<div id="modal-contact-form-wrapper" class="modal-contact-forma-c">
    <div class="modal-content-contact-form">
        <span class="close">&times;</span>
        <div class="col-md-12 text-center">
            <h3>Свържете се с нас</h3>
            <p>
                Чуствайте се свободни да използвате формата за контакт по-долу.
            </p>
        </div>

        <form name="contactForm" id="contact_form" method="post" action="/send-user-message" style="font-family: 'Helvetica Neue', Helvetica;">
            {{ csrf_field() }}
            <div class="row">
                <div>
                    <input type="text" name="name" id="name" required="required" oninvalid="this.setCustomValidity('Моля, въведете име!')" oninput="setCustomValidity('')" value="{{ isset(Auth::user()->name) ? Auth::user()->name : '' }}" class="form-control" placeholder="Вашето име">
                </div>

                <br>

                <div>
                    <input type="text" name="email" id="email" required="required" oninvalid="this.setCustomValidity('Моля, въведете имейл!')" oninput="setCustomValidity('')" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" class="form-control" placeholder="Вашия имейл">
                </div>

                <br>

                <div>
                    <textarea name="message" id="message" required="required" oninvalid="this.setCustomValidity('Моля, въведете съобщение!')" oninput="setCustomValidity('')" class="form-control" placeholder="Съобщение"></textarea>
                </div>

                <br>

                <div class="col-md-12">
                    <p id="submit">
                        <input type="submit" id="send_message" value="Изпрати" class="btn btn-border">
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
