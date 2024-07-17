@extends('admin.pages.app')

@section('Title', 'Add Content')
@section('content')

<div class="container">
    <form action="{{ route('AddContent.store') }}" method="POST">
    @csrf
    <h1>Add Category</h1>
    @if (session('error'))
        <h5 class="text-danger">{{ session('error') }}</h5>
    @endif
    <div class="form-group">
        <label for="contentTitle">Title</label>
        <input type="text" id="contentTitle" name="title" required>
    </div>
    <div class="form-group">
        <label for="contentCount">Count</label>
        <input type="number" id="contentCount" name="counts" required>
    </div>
    <div class="form-group">
        <label for="contentDescription">Description</label>
        <textarea id="contentDescription" name="description" rows="4" required></textarea>
    </div>

    <div class="form-group icon-selector">
        <label for="iconSelectBtn">Select Icon</label>
        <button type="button" class="btn" id="iconSelectBtn" onclick="toggleNewPopup()">Choose Icon</button>
        <div id="selectedIconDisplay" class="icon-display"></div>
        <input id="selectedIconInput" type="hidden" name="selectedIconInput">
    </div>

    <div class="new-overlay" id="newPopupContainer">
        <div class="new-popup">
            <div class="new-popup-header">
                <h2 class="new-popup-title">Choose an Icon</h2>
                <button class="new-close-btn" onclick="toggleNewPopup()">&times;</button>
            </div>
            <div class="new-icon-selection">
                <div class="new-icon-option d-flex flex-column" data-icon="bi bi-person-fill-check"><i class="bi bi-person-fill-check card-icon"></i><p>Person-Check</p></div>
                <div class="new-icon-option" data-icon="bi bi-list-columns-reverse"><i class="bi bi-list-columns-reverse card-icon"></i><p>List</p></div>
                <div class="new-icon-option" data-icon="bi bi-person-lines-fill"><i class="bi bi-person-lines-fill card-icon"></i><p>Person-lines</p></div>
                <div class="new-icon-option" data-icon="bi bi-gender-male"><i class="bi bi-gender-male card-icon"></i><p>Male</p></div>
                <div class="new-icon-option" data-icon="bi bi-gender-female"><i class="bi bi-gender-female card-icon"></i><p>Female</p></div>
                <!-- Add more icon options as needed -->
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end align-items-center">
        <button class="btn btn-primary">Submit</button>
    </div>
        
    </form>
</div>


    

    

@endsection