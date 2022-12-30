@extends('layout.blank')

@section('title')
    @lang('all.help')
@endsection


@section('content')
<div class="container-fluid">
        <div class="row justify-content-center m-t-20 p-b-20 m-b-30 border-bottom">
            <div class="col-md-4">
                <a href="{{route('home')}}"> <img class="animation__shake" src="{{ asset('assets/img/logo.png') }}" alt="{{ env('app_name') }}"
                                  height="50" width="50"></a>
            </div>
            <div class="col-md-6">
                <h2 class="text-right">@lang("all.help")</h2>
            </div>


        </div>

    <div class="row justify-content-center">
        <div class="col-md-8" id="accordion">
            <div class="card card-primary card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            1. اضافة مريض جديد
                        </h4>
                    </div>
                </a>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            2. اضافة موعد جديد
                        </h4>
                    </div>
                </a>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            3. اضافة دواء جديد
                        </h4>
                    </div>
                </a>
                <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                    </div>
                </div>
            </div>
            <div class="card card-warning card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            4. اضافة تحليل جديد
                        </h4>
                    </div>
                </a>
                <div id="collapseFour" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
                    </div>
                </div>
            </div>
            <div class="card card-warning card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            5. اضافة اشعة جديدة
                        </h4>
                    </div>
                </a>
                <div id="collapseFive" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                    </div>
                </div>
            </div>
            <div class="card card-warning card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            6. اضافة ارشادات جديدة
                        </h4>
                    </div>
                </a>
                <div id="collapseSix" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                    </div>
                </div>
            </div>
            <div class="card card-danger card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseSeven">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            7. اضافة مستخدم جديد للنظام
                        </h4>
                    </div>
                </a>
                <div id="collapseSeven" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.
                    </div>
                </div>
            </div>
            <div class="card card-danger card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseEight">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            8. تغيير صلاحيات المستخدم
                        </h4>
                    </div>
                </a>
                <div id="collapseEight" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
                    </div>
                </div>
            </div>
            <div class="card card-danger card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            9. تغيير الاعدادات
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-info card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            10. تعديل تصميم الروشتة
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-info card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            11. الباك اب
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-info card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            12. اضافة نوع كشف جديد
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-info card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            13. الصفحة الرئيسية ومعرفة جدول المواعيد
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-warning card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            14. معرفة مواعيد اليوم وترتيبها
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-warning card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            15. صفحة متابعة الكشف والروشته
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-warning card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            16. تغيير ترتيب مريض في الكشف
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-warning card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            17. طباعه الروشتة للمريض
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-success card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            18. طباعة وصل الترتيب للمريض
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-success card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            19. طباعه الكشف / الارشادات / التحاليل المطلوبة والاشعة للمريض
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>
            <div class="card card-success card-outline">
                <a class="d-block w-100" data-toggle="collapse" href="#collapseNine">
                    <div class="card-header">
                        <h4 class="card-title w-100">
                            20. الحسابات المالية
                        </h4>
                    </div>
                </a>
                <div id="collapseNine" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
