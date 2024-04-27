<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="origin" />

    <title>Админ-панель «Аренда высоты»</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/chart/chart.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/stock.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/form_customer.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/form_worddocument.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/tabs.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/modal.css') }}">


    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('frontend/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('frontend/img/favicon/favicon-16x16.png') }}">

    <style>
        .custom-file-label::after {
            content: 'Выбрать файл'!important;
        }


        .ck-editor__editable_inline {
            min-height: 300px;
        }

        #map {
      height: 400px;
        }
    </style>

</head>



<body class="hold-transition sidebar-mini">
    @include('admin.inc.modal')
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="{{ route('logout') }}">
                    Выход
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/') }}" class="brand-link" target="_blank">
            <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Посетить сайт</span>
        </a>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Редактировать сайт
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Статьи</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Прайс леса
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('pricescaff.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Фото прайса</p>
                                    </a>
                                    <a href="{{ route('postpricefile.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Загрука прайса(файл)</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                        <li class="nav-item has-treeview">
                            <a href="{{ route('postpricefile.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Прайс и каталог
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('pricetours.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Прайс вышки-туры</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('postsimgtours.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Медиа вышки туры</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('postscaff.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Медиа строительные леса</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('poststexnica.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Медиа техника</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('poststractor.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Медиа минитрактор</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('postssnow.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Медиа уборка снега с крыш</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('postswarehouse.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Медиа складов</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('postsblog.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Блог</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('postsdiscounts.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Изменить скидку</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <div class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Клиенты
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contacts.index') }}" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Клиенты с сайта</p>
                            </a>
                        </li>
                        <div class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-id-card-alt nav-icon"></i>
                                <p>База клиентов</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('customerbase.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Клиенты леса</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('customerbasetours.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Клиенты вышки-туры</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <li class="nav-item has-treeview">
                            <p onclick="openModalDiscounts()" class="nav-link">Проверить код клиента</p>
                        </li>
                    </ul>
                </div>
                <div class="nav-item has-treeview">
                    <a href="{{ route('employees.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                           Сотрудники
                        </p>
                    </a>
                </div>
                <div class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                           Сообщения
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contracts.create') }}" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Написать на почту</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posttg.create') }}" class="nav-link">
                                <i class="fab fa-telegram nav-icon"></i>
                                <p>Написать в телеграмм </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('postswats.create') }}" class="nav-link">
                                <i class="fab fa-whatsapp nav-icon"></i>
                                <p>Написать в whatsapp </p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav-item has-treeview">
                    <a href="{{ route('statistics.index') }}" class="nav-link">
                        <i class="nav-icon  fas fa-chart-bar"></i>
                        <p>
                           Статистика
                        </p>
                    </a>
                </div>
                <div class="nav-item has-treeview">
                    <a href="{{ route('orders.index') }}"  class="nav-link">
                        <i class="nav-icon fa fa-shopping-bag"></i>
                        <p>
                           Заказы <div id="orderhide" style="border-radius: 40px;
                           width: 18px;
                           position: absolute;
                           background: #007bff;
                           color: white;
                           left: 105px;
                           bottom: 6px;"><div style="text-align: center;" id="orderapi"></div></div>
                        </p>
                    </a>
                </div>
                <div class="nav-item has-treeview">
                    <a href="{{ route('documents.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                           Документы
                        </p>
                    </a>
                </div>
                <div class="nav-item has-treeview">
                    <a href="{{ route('words.create') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-word"></i>
                        <p>
                            Создания договора
                        </p>
                    </a>
                </div>
                <div class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>

                            Финансы
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('finace.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Учет наличных</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>

                            Склад
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('stocks.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Техника</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('index1') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Леса</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('index2') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Вышки-туры</p>
                            </a>
                        </li> --}}
                    </ul>
                </div>
                <div class="nav-item has-treeview">
                    <a href="{{ route('logistics.index') }}" class="nav-link">
                        <i class="nav-icon fas fa fa-truck"></i>
                        <p>
                            Логистика
                        </p>
                    </a>
                </div>
                 {{-- <div class="nav-item has-treeview">
                    <a href="{{ route('chat.index') }}" class="nav-link">

                        <p>
                            Чат
                        </p>
                    </a>
                </div> --}}
                @php
                    use App\Models\RunStr;
                    $active = RunStr::all()->first();
                @endphp
                <div class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fa fa-gears nav-icon"></i>
                            <p>Настройка сайта</p>
                            <i class="right fas fa-angle-left"></i>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item has-treeview">
                                @if($active->is_active == 1)
                                    <a href="{{ route('run_string') }}" class="nav-link">
                                        Отключить бегущаю строку
                                    </a>
                                @else
                                    <a href="{{ route('run_string') }}" class="nav-link">
                                        Включить бегущаю строку
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item has-treeview">
                                @if($active->is_hcaptcha == 1)
                                    <a href="{{ route('hcaptcha') }}" class="nav-link">
                                        Отключить HCaptcha
                                    </a>
                                @else
                                    <a href="{{ route('hcaptcha') }}" class="nav-link">
                                        Включить HCaptcha
                                    </a>
                                @endif
                            </li>
                            <li class="nav-item has-treeview">
                                @if(auth()->check() && auth()->user()->is_dev)
                                <a href="{{ route('update_dev') }}" class="nav-link">
                                    Обновить карту сайта
                                </a>
                                @endif
                            </li>
                            <li class="nav-item has-treeview">
                                @if(auth()->check() && auth()->user()->is_dev)
                                    @if($active->is_technical == 1)
                                        <a href="{{ route('page_technical') }}" class="nav-link">
                                            Возобновить работу сайта
                                        </a>
                                    @else
                                        <a href="{{ route('page_technical') }}" class="nav-link">
                                            Остановить работу сайта
                                        </a>
                                    @endif
                                @endif
                            </li>
                        </ul>
                </div>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </aside>

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('err'))
                    <div class="alert alert-danger">
                        {{ session('err') }}
                    </div>
                @endif
                @if (session()->has('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif
            </div>
        </div>
        @yield('content')
    </div>

    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>
            @if(date('Y') == '2021')
                Copyright &copy; 2021
            @else
                Copyright &copy; 2021 - {{ date('Y') }}
            @endif
        </strong>
    </footer>
</div>



<!-- ./wrapper -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<!-- Ckeditor 5 -->
<script src="{{ asset('backend/ckeditor5/build/ckeditor.js') }}"></script>
<!-- Customer scripts -->
<script src="{{ asset('backend/script.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

<script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script async  src="{{ asset('backend/chart/chart.js') }}"></script>
<script async  src="{{ asset('backend/chart/OrderApi.js') }}"></script>
<script async  src="{{ asset('backend/greenApi/greenApi.js') }}"></script>
<script async  src="{{ asset('backend/calcArea/calcArea.js') }}"></script>
<script async  src="{{ asset('backend/calcArea/modal.js') }}"></script>
<script async  src="{{ asset('backend/calcArea/calc.js') }}"></script>
<script async  src="{{ asset('backend/map/apimap.js') }}"></script>
<script async  src="{{ asset('backend/socket/socket.js') }}"></script>
<script async  src="{{ asset('backend/run_string/run_string.js') }}"></script>
<script async  src="{{ asset('backend/modalDiscounts/modalDiscounts.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=159d1b30-bef0-463b-a7f6-b69cba7ec8e9" type="text/javascript"></script>

<script>
    function toggleCheckboxes() {
      // Получение всех элементов <input> с типом "checkbox"
      var checkboxes = document.querySelectorAll('input[type="checkbox"]');

      // Переключение видимости чекбоксов
      checkboxes.forEach(function(checkbox) {
        checkbox.style.display = 'block';
      });
    }
</script>

<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>



<script src="../build/ckeditor.js"></script>
		<script>ClassicEditor
				.create( document.querySelector( '.editor' ), {
					licenseKey: '',
				} )
				.then( editor => {
					window.editor = editor;
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: 6jdakw6yb6bl-8ek9xs5l5res' );
					console.error( error );
				} );
</script>
<script>
    $(function() {
    $('.sortable').sortable({
        items: 'tr',
        update: function(event, ui) {
            var toursId = $(ui.item).data('tours-id');
            var newOrderTours = [];

            $(this).find('tr').each(function(index) {
                var position = index + 1; // Новая позиция

                newOrderTours.push({ toursId: $(this).data('tours-id'), position: position });
            });

            // Проверка изменения позиции элемента
            var oldPosition = $(ui.item).data('position');
            var newPosition = $(ui.item).index() + 1;
            if (oldPosition === newPosition) {
                return; // Если позиция не изменилась, прекратить выполнение
            }

            // Обновление позиций объектов
            newOrderTours.forEach(function(tour, index) {
                tour.position = index + 1;
            });

            // Сортировка
            newOrderTours.sort(function(a, b) {
                return a.position - b.position;
            });

            newOrderTours.forEach(function(tour, index) {
                var updatedToursId = tour.toursId;
                var updatedPosition = index + 1;

                console.log("Старая позиция toursId:", updatedToursId, ":", oldPosition);
                console.log("Новая позиция toursId:", updatedToursId, ":", updatedPosition);

                // Остальной код для отправки на сервер
                $.post('/posts/' + updatedToursId + '/order-tours', {
                    _token: "{{ csrf_token() }}",
                    order_tours: updatedPosition,
                    }, function(response) {
                        console.log(response);
                    }).fail(function(xhr) {
                        console.log(xhr.responseText);
                    });
                });
            }
        });
    });
</script>

<script>
    $(function() {
    $('.sortable_lesa').sortable({
        items: 'tr',
        update: function(event, ui) {
            var lesaId = $(ui.item).data('lesa-id');
            var newOrderLesa = [];

            $(this).find('tr').each(function(index) {
                var position = index + 1; // New position

                newOrderLesa.push({ lesaId: $(this).data('lesa-id'), position: position });
            });

            // Check if the position of the item has changed
            var oldPosition = $(ui.item).data('position');
            var newPosition = $(ui.item).index() + 1;
            if (oldPosition === newPosition) {
                return; // If the position hasn't changed, stop execution
            }

            // Update positions of objects
            newOrderLesa.forEach(function(lesa, index) {
                lesa.position = index + 1;
            });

            // Sort
            newOrderLesa.sort(function(a, b) {
                return a.position - b.position;
            });

            newOrderLesa.forEach(function(lesa, index) {
                var updatedLesaId = lesa.lesaId;
                var updatedPosition = index + 1;

                console.log("Old position:", updatedLesaId, ":", oldPosition);
                console.log("New position:", updatedLesaId, ":", updatedPosition);

                // Further code to send to the server
                $.ajax({
                    url: '/posts/' + updatedLesaId + '/order-lesa',
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        order: updatedPosition,
                    },
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        }
    });
});
</script>


</body>
</html>
