<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
</div>
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ $forms->form_name }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            {{-- <a href="Survey/Survey/htdocs/index.php" class="btn btn-sm btn-primary">{{ __('Add Restaurant') }}</a> --}}
                            <a href="{{ route('survey.index') }}" class="btn btn-sm btn-danger">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Cli_Timestamp') }}</th>
                                @foreach($forms->field as $field)
                                    <th scope="col">{{ $field->field_label }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($forms->entry as $entry)
                            <tr>
                                <th scope="col">{{ $entry->created_at->locale(Config::get('app.locale'))->isoFormat('L') }}</th>
                                @foreach(json_decode($entry->entries_json) as $answer)
                                    @if(is_array($answer))
                                        <th scope="col">{{ implode(',',$answer) }}</th>
                                    @else
                                        <th scope="col">{{ $answer }}</th>
                                    @endif
                                @endforeach
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>