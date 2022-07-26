<title>TD</title>
<!-- Custom fonts for this template-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('css/fontawesome-iconpicker.min.css')}}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{asset('js/sb-admin-2.js')}}"></script>

<script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('js/demo/datatables-demo.js')}}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-85082661-5"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }

  gtag('js', new Date());
  gtag('config', 'UA-85082661-5');
</script>
<script src="https://unpkg.com/popper.js@1.15.0/dist/umd/popper.min.js"></script>

<script src="{{asset('js/fontawesome-iconpicker.min.js')}}"></script>
<style media="screen">
.file-upload {
  background-color: #f8f9fc;
  width: 100%;
  margin: 0 auto;
  padding: 20px;
}

.file-upload-btn {
  width: 100%;
  margin: 0;
  color: #fff;
  background: #1FB264;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #15824B;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.file-upload-btn:hover {
  background: #1AA059;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.file-upload-btn:active {
  border: 0;
  transition: all .2s ease;
}

.file-upload-content {
  display: none;
  text-align: center;
}

.file-upload-input {
  position: absolute;
  margin: 0;
  padding: 0;
  width: 100%;
  height: 100%;
  outline: none;
  opacity: 0;
  cursor: pointer;
}

.image-upload-wrap {
  margin-top: 20px;
  border: 4px dashed #4e73df;
  position: relative;
}

.image-dropping,
.image-upload-wrap:hover {
  background-color: #4e73dfab;
  border: 4px dashed #ffffff;
}

.image-title-wrap {
  padding: 0 15px 15px 15px;
  color: #222;
}

.drag-text {
  text-align: center;
}

.drag-text h3 {
  font-weight: 100;
  text-transform: uppercase;
  color: #343535;
  padding: 60px 0;
}

.file-upload-image {
  max-height: 200px;
  max-width: 200px;
  margin: auto;
  padding: 20px;
}

.remove-image {
  width: 200px;
  margin: 0;
  color: #fff;
  background: #941a0c;
  border: none;
  padding: 10px;
  border-radius: 4px;
  border-bottom: 4px solid #b02818;
  transition: all .2s ease;
  outline: none;
  text-transform: uppercase;
  font-weight: 700;
}

.remove-image:hover {
  background: #c13b2a;
  color: #ffffff;
  transition: all .2s ease;
  cursor: pointer;
}

.remove-image:active {
  border: 0;
  transition: all .2s ease;
}
</style>

<style>
    footer {
        font-style: italic;
        background: #f7f7f7;
        padding: 60px;
        text-align: center;
        margin-top: 60px;
    }

    pre {
        text-align: left;
    }

    .form-control, .form-group {
        position: relative;
    }

    p.lead {
        max-width: 800px;
        margin: 0 auto 20px auto;
    }

    div.lead {
        margin: 30px 0;
    }

    a.action-placement {
        margin: 0 4px 4px 4px;
        display: inline-block;
        /*border-bottom: 1px dotted #428BCA;*/
        text-decoration: none;
    }

    a.action-placement.active {
        color: #5CB85C;
    }

    .form-group {
        text-align: left;
        margin-bottom: 30px;
    }

    .form-group label {
        display: block;
        margin-bottom: 15px;
    }

    .lead iframe {
        display: inline-block;
        vertical-align: middle;
    }
</style>
