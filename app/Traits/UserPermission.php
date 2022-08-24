<?php

namespace App\Traits;

trait UserPermission{
    public function checkRequestPermission(){
        if(
            empty(auth()->user()->role->permission['permission']['admins']['list']) && \Route::is('back.admins.index') ||
            empty(auth()->user()->role->permission['permission']['admins']['add']) && \Route::is('back.admins.create') ||
            empty(auth()->user()->role->permission['permission']['admins']['edit']) && \Route::is('back.admins.edit')
        ){
            return response()->view('back.dashboard');
        }elseif(
            empty(auth()->user()->role->permission['permission']['role']['list']) && \Route::is('back.role.index') ||
            empty(auth()->user()->role->permission['permission']['role']['add']) && \Route::is('back.role.create') ||
            empty(auth()->user()->role->permission['permission']['role']['edit']) && \Route::is('back.role.edit')
        ){
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['permissions']['list']) && \Route::is('back.permission.index') ||
            empty(auth()->user()->role->permission['permission']['permissions']['add']) && \Route::is('back.permission.create') ||
            empty(auth()->user()->role->permission['permission']['permissions']['edit']) && \Route::is('back.permission.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['news']['list']) && \Route::is('back.news.index') ||
            empty(auth()->user()->role->permission['permission']['news']['add']) && \Route::is('back.news.create') ||
            empty(auth()->user()->role->permission['permission']['news']['edit']) && \Route::is('back.news.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['product']['list']) && \Route::is('back.product.index') ||
            empty(auth()->user()->role->permission['permission']['product']['add']) && \Route::is('back.product.create') ||
            empty(auth()->user()->role->permission['permission']['product']['edit']) && \Route::is('back.product.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['customer']['list']) && \Route::is('back.customer.index') ||
            empty(auth()->user()->role->permission['permission']['customer']['add']) && \Route::is('back.customer.create') ||
            empty(auth()->user()->role->permission['permission']['customer']['edit']) && \Route::is('back.customer.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['faq']['list']) && \Route::is('back.faq.index') ||
            empty(auth()->user()->role->permission['permission']['faq']['add']) && \Route::is('back.faq.create') ||
            empty(auth()->user()->role->permission['permission']['faq']['edit']) && \Route::is('back.faq.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['testimonial']['list']) && \Route::is('back.testimonial.index') ||
            empty(auth()->user()->role->permission['permission']['testimonial']['add']) && \Route::is('back.testimonial.create') ||
            empty(auth()->user()->role->permission['permission']['testimonial']['edit']) && \Route::is('back.testimonial.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['service']['list']) && \Route::is('back.service.index') ||
            empty(auth()->user()->role->permission['permission']['service']['add']) && \Route::is('back.service.create') ||
            empty(auth()->user()->role->permission['permission']['service']['edit']) && \Route::is('back.service.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['value']['list']) && \Route::is('back.value.index') ||
            empty(auth()->user()->role->permission['permission']['value']['add']) && \Route::is('back.value.create') ||
            empty(auth()->user()->role->permission['permission']['value']['edit']) && \Route::is('back.value.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['galleries']['list']) && \Route::is('back.galleries.index') ||
            empty(auth()->user()->role->permission['permission']['galleries']['add']) && \Route::is('back.galleries.create') ||
            empty(auth()->user()->role->permission['permission']['galleries']['edit']) && \Route::is('back.galleries.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['pages']['list']) && \Route::is('back.pages.index') ||
            empty(auth()->user()->role->permission['permission']['pages']['add']) && \Route::is('back.pages.create') ||
            empty(auth()->user()->role->permission['permission']['pages']['edit']) && \Route::is('back.pages.edit')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['menus']['list']) && \Route::is('back.menus.index')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['settings']['list']) && \Route::is('back.frontend.general')
        ) {
            return response()->view('back.dashboard');
        }elseif (
            empty(auth()->user()->role->permission['permission']['request-contact']['list']) && \Route::is('back.request-contact.index')
        ) {
            return response()->view('back.dashboard');
        }
    }
}
