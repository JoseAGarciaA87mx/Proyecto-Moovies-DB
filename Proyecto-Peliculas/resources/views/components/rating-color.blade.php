
                    @if($rating > 95)
                    <span style="color:  #0971ed ;">
                        @elseif($rating > 90)
                        <span style="color:  #09ed6a ;">
                            @elseif($rating > 80)
                            <span style="color:   #6ded09 ;">
                                @elseif($rating > 70)
                                <span style="color:   #bded09 ;">
                                    @elseif($rating > 60)
                                    <span style="color:   #edb909  ;">
                                        @elseif($rating > 50)
                                        <span style="color:   #ed6609  ;">
                                            @else
                                            <span style="color:   #ed0909   ;">
                                                @endif

                                                {{ $rating }}</span>