@extends('welcome')
@section('content')
    <div class="serviceContainer">
        <div class="serviceTitle">Service</div>
        <div class="serviceInner">
            <div class="serviceLeft">
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="serviceData.whoTitle"></div>
                <div class="serviceContent" x-text="serviceData.whoContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum illo incidunt itaque laboriosam, nisi qui quibusdam reiciendis sed similique voluptatem. Aliquid delectus dolorem dolores hic impedit porro possimus quas unde.</div>
                <br>
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="serviceData.offerTitle">Cine Sintem</div>
                <div class="serviceContent" x-text="serviceData.offerContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum illo incidunt itaque laboriosam, nisi qui quibusdam reiciendis sed similique voluptatem. Aliquid delectus dolorem dolores hic impedit porro possimus quas unde.</div>
            </div>
            <div class="serviceRight">
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="serviceData.insureTitle">Cine Sintem</div>
                <div class="serviceContent" x-text="serviceData.insureContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum illo incidunt itaque laboriosam, nisi qui quibusdam reiciendis sed similique voluptatem. Aliquid delectus dolorem dolores hic impedit porro possimus quas unde.</div>
                <br>
                <div class="serviceLine"></div>
                <div class="serviceInnerTitle" x-text="serviceData.colabTitle">Cine Sintem</div>
                <div class="serviceContent" x-text="serviceData.colabContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum illo incidunt itaque laboriosam, nisi qui quibusdam reiciendis sed similique voluptatem. Aliquid delectus dolorem dolores hic impedit porro possimus quas unde.</div>
            </div>
        </div>
    </div>
@endsection
