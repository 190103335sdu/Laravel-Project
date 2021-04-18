@component('mail::message')
# Introduction

New request to create Shop

Shop Name: {{$shop->name}}
Shop Owner: {{$shop->owner->name}}
@component('mail::button', ['url' => url('/admin/shops')])
Manage Shops
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
