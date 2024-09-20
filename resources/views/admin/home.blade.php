<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.part.head')
</head>
<body>
    <section class="admin">
        <div class="row-grid">
            <div class="admin-sidebar">
                @include('admin.part.sidebar')
            </div>
            <div class="admin-content">
                <div class="admin-content-top">
                    @include('admin.part.header')
                </div>
                <div class="admin-content-main">
                    <div class="admin-content-main-title">
                        <h1>DashBoard</h1>
                    </div>
                    <div class="admin-content-main-content">
                        <!--Content inside-->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>@include('admin.part.footer')</footer>
</body>
</html>