     <div id="tree"></div>                


<script>

function getTree() {

  var tree = [
                  {
                        text: "Create Resume",
                        href: "{{ asset('seekers/manage/upload-resume')}}",

                  },
                  {{--*/ $sep = '' /*--}}
                  {{--*/ $exp = 'false' /*--}}
                  @foreach($obj as $o)
                  {
                        {{--*/ $sep = $sep + 1 /*--}}
                        @if($sep == 1)
                             {{--*/ $exp = 'true' /*--}}
                        @else
                              {{--*/ $exp = 'false' /*--}}
                        @endif
                        text: "{{$o->title}}",
                        state :{expanded : {{$exp}},selected : {{$exp}}},
                        nodes: [
                              @foreach($sections as $s)
                                    {
                                      text: "{{($s->append_update_text?'Update ':'').$s->title}}",
                                      href: "{{asset($s->url)}}/{{$o->id}}",
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