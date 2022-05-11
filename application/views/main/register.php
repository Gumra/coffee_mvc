<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Создать аккаунт</h3></div>
                            <div class="card-body">
                                <form action="/register" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="firstName" id="inputFirstName" type="text" placeholder="Имя" />
                                                <label for="inputFirstName">Имя</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input class="form-control" name="lastName" id="inputLastName" type="text" placeholder="Фамилия" />
                                                <label for="inputLastName">Фамилия</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Почта</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="birthday" id="inputBirthday" type="date" placeholder="Дата рождения" />
                                                <label for="inputBirthday">Дата рождения</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="phone" id="inputPhone" type="text" placeholder="8-(***)-**-**" />
                                                <label for="inputPhone">Телефон</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="address" id="inputAddress" type="text" placeholder="Введите адрес" />
                                                <label for="inputAddress">Адрес</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Введите пароль" />
                                                <label for="inputPassword">Пароль</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" name="confirmPassword" id="inputPasswordConfirm" type="password" placeholder="Подвтвердите пароль" />
                                                <label for="inputPasswordConfirm">Подтвердите пароль</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <label for="formFile" class="form-label"></label>
                                                <input class="form-control" name="img" type="file" id="formFile" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary">Регистрация</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="/login">Уже есть аккаунт?</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
