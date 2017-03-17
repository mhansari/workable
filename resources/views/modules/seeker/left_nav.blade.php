     <div id="tree"></div>                


<script>

function getTree() {

  var tree = [
                  {
                        text: "Create Resume",
                        href: "{{ asset($country . '/seekers/manage/upload-resume')}}",

                  },
                  {{--*/ $sep = '' /*--}}
                  {{--*/ $exp = 'false' /*--}}

                  @foreach($obj as $o)
                  {

                        {{--*/ $sep = $sep + 1 /*--}}
                        @if($o->id == (isset($resumeid)?$resumeid:0))
                             {{--*/ $exp = 'true' /*--}}
                        @else
                              {{--*/ $exp = 'false' /*--}}
                        @endif
                        text: "{{$o->title}}",
                        state :{expanded : {{$exp}}},
                        nodes: [
                              @foreach($sections as $s)
                                    {

                                      text: "{{($s->append_update_text?'Update ':'').$s->title}}",
                                      href: "{{asset($country . '/' . $s->url)}}/{{$o->id}}",
                                      @if(\Request::is('*'.str_replace(' ','-',strtolower($s->title)).'*') && $o->id == (isset($resumeid)?$resumeid:0))
                                      state :{selected : true,selectedBackColor:'#cccccc'}
                                      @endif
                                    },
                              @endforeach
                               ]
                  },
                  @endforeach
  
            ];
  return tree;
}

$('#tree').treeview({levels: 1,enableLinks: true,data: getTree()});
</script>