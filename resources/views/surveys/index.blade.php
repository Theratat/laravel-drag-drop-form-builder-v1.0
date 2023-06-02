<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Survey') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <a href="Survey/Survey/htdocs/index.php" class="btn btn-sm btn-primary">{{ __('Add Restaurant') }}</a> --}}
                            <a href="{{ route('survey.create') }}" class="btn btn-sm btn-primary">{{ __('Create Survey') }}</a>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Cli_Timestamp') }}</th>
                                <th scope="col">{{ __('Survey title') }}</th>
                                <th scope="col">{{ __('Survey Participant') }}</th>
                                <th scope="col">{{ __('Management') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms as $form)
                            <tr>
                                <th scope="col">{{ $form->created_at->locale(Config::get('app.locale'))->isoFormat('L') }}</th>
                                <th scope="col">{{ $form->form_name }}</th>
                                <th scope="col">{{ $form->countEntry() }}</th>
                                <th scope="col">
                                    <a href="{{ route('survey.qr',$form->id) }}" target="_blank" class="btn btn-success btn-sm"><span class="btn-inner--icon"><i class="fas fa-qrcode"></i></span> {{ __('QR') }}</a>
                                    <a href="{{ route('survey.entryShow',$form->id) }}" class="btn btn-primary btn-sm"><span class="btn-inner--icon"><i class="ni ni-books"></i></span> {{ __('Enties') }}</a>
                                    <a href="{{ route('survey.delete',$form->id) }}" class="btn btn-danger btn-sm"><span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span> {{ __('crud.delete') }}</a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $restorants->links() }}
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>