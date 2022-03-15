@extends('layouts.app')
@section('page_title','Home');
@section('content')
    <fieldset>
        <p id="ctrldemo"></p>
    </fieldset>

    <script>
        var ctrldemo = document.getElementById('ctrldemo')

        async function loadCTRL(fname) {
            try {
                var response = await fetch(fname)
                var j = await response.json()
                ctrldemo.innerHTML = JSON.stringify(j)
            } catch (err) {
                ctrldemo.innerHTML = "Error, can't load " + fname + " " + err
            }
        }

        loadCTRL("")
    </script>
@endsection
