<div class="container" id = "messagePages">
    <h2>Напишите нам сообщение</h2>
    <p>Если у Вас есть вопросы или Вы желаете оставить заявку на замер окон, заполните форму, приведенную ниже.</p>

    <p>* Все поля ОБЯЗАТЕЛЬНЫ для заполнения!</p>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm">
            <form class="needs-validation" action="/message.html" method="post" id="form_message">
                <div class="form">
                    <div class="col-md mb-3">

                        <label for="username">Ф. И. О. <span id="namespan"></span></label>
                        <input name="username" type="text" class="form-control" id="username" placeholder="Ф. И. О.">

                    </div>
                    <div class="col-md mb-3">
                        <label for="usertel">Номер телефона <span id="telspan"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">&#9742</span>
                            </div>
                            <input name="usertel" type="text" class="form-control" id="usertel" placeholder="0 (373) 777 7-77-77" aria-describedby="inputGroupPrepend">

                        </div>
                    </div>
                    <div class="col-md mb-3">
                        <label for="usermail">Электронная почта <span id="mailspan"></span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                            </div>
                            <input name="usermail" type="text" class="form-control" id="usermail" placeholder="Электронная почта" aria-describedby="inputGroupPrepend">

                        </div>
                    </div>
                    <div class="col-md mb-3">
                        <label for="theme">Тема</label>
                        <input name="theme" type="text" class="form-control" id="theme" placeholder="Тема сообщения">
                        <div class="invalid-feedback">
                            Тема.
                        </div>
                    </div>
                    <div class="col-sm mb-3">
                        <label for="message">Сообщение</label>
                        <textarea name="message" id="message" class="form-control" rows="3" placeholder="Сообщение"></textarea>

                    </div>
                </div>

                <button name="message_send" id="submitd" value="Отправить сообщение" class="btn btn-primary ml-3" type="submit">Отправить сообщение</button>
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>
