<template>

    <div class="admin-bg">
    
    
    
    <div class="case-form-container">
        <form class="case-form">
            <label for="criminal-name">Criminal Name:</label>
            <input type="text" id="criminal-name" name="criminal-name">
    
            <label for="upload-image">Upload Image:</label>
            <input type="file" id="upload-image" name="upload-image">
    
            <label for="biography">Biography:</label>
            <textarea id="biography" name="biography" rows="4"></textarea>
    
            <label for="murders">Murders:</label>
            <textarea id="murders" name="murders" rows="2"></textarea>
    
            <label for="arrest-prison-death">Arrest, Prison, and Death:</label>
            <textarea id="arrest-prison-death" name="arrest-prison-death" rows="3"></textarea>
    
            <label for="validated-sources">Validated Sources:</label>
            <textarea id="validated-sources" name="validated-sources" rows="2"></textarea>
    
            <button type="submit" class="submit-button">Submit</button>
        </form>
    </div>
    </div>
    </template>
    
    
    
    <style scoped>
    
      @import 'resources/css/admin.css';
    </style>