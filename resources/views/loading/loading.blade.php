
<!-- Include the CSS for the loading spinner -->
<link rel="stylesheet" href="{{ asset('admins/css/loading-page.css') }}">

<!-- Breadcrumb Navigation -->
{{--  <ol class="breadcrumb page-breadcrumb">
    <div class="breadcrumb-item"><a href="{{ url('admins/formloading') }}"></a></div>
</ol>  --}}

<!-- Loading Spinner -->
<div id="formloading" class="loading-overlay">
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="drive loading">Loading...</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var content = document.getElementById("content");
    });

    window.addEventListener("load", function() {
        var loader = document.getElementById("formloading");
        var content = document.getElementById("content");

        // Hide the loader and show the content once the page is fully loaded
        loader.style.display = "none";
    });
</script>

