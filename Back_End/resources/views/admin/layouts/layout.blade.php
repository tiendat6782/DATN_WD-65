<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
@include('admin.layouts.head')

    <div class="container-xxl flex-grow-1 container-p-y card">
        <div class="row gy-4">
          @yield('contain')
        </div>
      </div>


@include('admin.layouts.footer')
