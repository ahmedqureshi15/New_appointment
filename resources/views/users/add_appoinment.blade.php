<div class="form-group col-sm-6">

    <div class="card">

      <div class="card-body">
        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
         @csrf
          <div class="form-group">
            <label for="program">Which Program</label>
            <select class = 'form-control' id='program' name="program"  multiple>
                <option value="global-entry" selected>Global Entry</option>
                <option value="sentri">Sentri</option>
                <option value="nexus">Nexus</option>
              </select>
             </div>



                         </div>
         <!-- Submit Field -->
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}


    <button type="submit" id = "register" class="btn btn-primary">Submit</button>
    {{-- <a href="{{ url('stripe') }}" class="active">Next</a> --}}

    {{-- <a href="{!! route('users.stripe') !!}" class="btn btn-primary">Next</a> --}}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
        </form>
      </div>
    </div>
  </div>
