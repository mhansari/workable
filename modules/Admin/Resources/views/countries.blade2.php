@extends('admin::layouts.master')

@section('content')
@include('admin::left')
@include('admin::footer')
</div>
            </div>
@include('admin::top')

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Countries</h3>
                          {{ Html::link('/admin/countries/new', 'Add nrew Country',array())}}
                        </div>
                    </div>
                </div>

             
            </div>tt
            <!-- /page content -->
@stop