@extends('frontend.dashboard.main')

@section('dashboard')
    <div class="dashboard-section dashboard-my-listing">
        <div class="dashboard-section-title">
            <h5>Review</h5>
            <span class="ti-map-alt"></span>
        </div>
        <div class="dashboard-section-body">
            <div class="my-listing-wrapper">
                @if ($listing->isNotEmpty())
                    @foreach ($listing as $key => $item)

                        @php ($image = 'feature_image/'.$item->feature_image)
                        <div class="my-listing">
                            <div class="thumb">
                                <a href="listing/{{$item->id}}/details">
                                    {{Html::image($image,'profile picture',array('hight'=>110,'width'=>130,'class' => 'img-fluid'))}}
                                </a>
                            </div>
                            <div class="body">
                                <div class="content">
                                    <h4><a href="listing/{{$item->id}}/details">{{$item->title}}</a></h4>
                                    <p class="listing-address">715 Eagle Drive MI 4821</p>
                                    <p class="listing-meta"><span class="view"><i class="fas fa-eye"></i>{{$item->total_view}} Views</span></p>
                                </div>
                                <div class="controller">
                                    {!! Form::open(['method' => 'DELETE','class'=>'listing-delete-form','route' => ['listing.delete', $item->id]]) !!}
                                        <button onClick="return confirm('Are you absolutely sure you want to delete?')" class="remove" type="submit"><i class="fas fa-trash-alt"></i> </button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                @endforeach
                @else
                    @lang('trn.NO_DATA_FOUND')
                @endif
                @if ($listing->isNotEmpty())
                    <nav class="navigation pagination text-center mar-30">
                        <div class="nav-links">
                            {{$listing->links() }}
                        </div>
                    </nav>
                @endif
            </div>
        </div>
    </div>
@endsection