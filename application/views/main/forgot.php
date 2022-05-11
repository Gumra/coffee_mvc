<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Восстановление пароля</h3></div>
                            <div class="card-body">
                                <div class="small mb-3 text-muted">Введите почту и мы пришлём код для восстановления</div>
                                <form action="/forgot" method="post">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="email" id="inputEmail" type="email" placeholder="name@example.com" />
                                        <label for="inputEmail">Почта</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="/login">Вернуться к логину</a>
                                        <button type="submit" class="btn btn-primary">Выслать код</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="/register">Нужен аккаунт? Зарегистрируйтесь!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

