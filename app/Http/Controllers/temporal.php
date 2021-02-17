if($via==0){
         $inser=Via::insert(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'nomvia'=>$vias,'ciu'=>$idc]);

         $idvia=via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
         if($senm==0){
             $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
             $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
             $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr[0]]);

                                    return redirect()->route('listUbication')
                                    ->with('info');
                                }else{
                                    $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                    foreach ($aux1 as $aut) {
                                        dd('todo esta 5');
                                        if ($aut->estado=='Desactivado'&& $aut->activo==false) {
                                            dd('todo esta 6');
                                            $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                            return redirect()->route('listUbication')
                                                        ->with('info');
                                        } else {
                                            return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                        }
                                    }
                                }
                            }else{
                                $idvia= via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                $selcVia=Via::where('id_via','=',$idvia)->select('via.id_via','via.tipo','via.nuncarril','via.dimension','via.clacificacion')->get();
                              foreach($selcVia as $selc){
                                dd('todo esta 8');
                                if($selc->tipo==$tipo && $selc->nuncarril==$carri && $selc->dimension==$dime && $selc->clascificacion==$clasi){
                                    dd('todo esta 9');
                                    if($senm==0){dd('todo esta 10');
                                        $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                        $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                        $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                        return redirect()->route('listUbication')
                                        ->with('info');
                                    }else{
                                        $viaI=Via::where('via.id_via','=',$idvia)->update(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi]);
                                        $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                        foreach ($aux1 as $aut) {dd('todo esta 12');
                                            if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 13');
                                                $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                                return redirect()->route('listUbication')
                                                ->with('info');
                                            } else {
                                                return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                            }
                                        }
                                    }

                                }  else {
                                    $updV=Via::where('id_via','=',$selc->id_via)->update(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi]);
                                    if($senm==0){dd('todo esta 15');
                                        $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                        $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                        $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr[0]]);

                                        return redirect()->route('listUbication')
                                        ->with('info');
                                    }else{
                                        $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                        foreach ($aux1 as $aut) {dd('todo esta 17');
                                            if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 18');
                                                $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                                return redirect()->route('listUbication')
                                                ->with('info');
                                            } else {
                                                return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                            }
                                        }
                                    }

                                }
                                }
                            }
                        }else{
                            $idc=ciudad::where('nombc','=',$ciu)->where('depa','=',$depa)->pluck('id_ciudad')->first();
                            if($via==0){
                                $inser=Via::insert(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'nomvia'=>$vias,'ciu'=>$idc]);

                                $idvia=via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                if($senm==0){
                                    $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                    $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                    $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                    return redirect()->route('listUbication')
                                    ->with('info');
                                }else{
                                    $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                    foreach ($aux1 as $aut) {
                                            dd($aux1);
                                        if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 24');
                                            $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);
                                            return redirect()->route('listUbication')
                                                        ->with('info');
                                        } else {
                                            return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                        }
                                    }
                                }
                            }else{
                                $idvia= via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                if($senm==0){
                                    $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                    $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                    $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                    return redirect()->route('listUbication')
                                    ->with('info');
                                }else{

                                    $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                    foreach ($aux1 as $aut) {
                                        if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 29');
                                            $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                            return redirect()->route('listUbication')
                                                        ->with('info');

                                        } else {
                                            return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                        }
                                    }
                                }
                            }
                        }
                        -----------------------------------------------------------

                        $aux=ciudad::insert(['nombc'=>$ciu,'depa'=>$depa]);
                            $idc=ciudad::where('nombc','=',$ciu)->where('depa','=',$depa)->pluck('id_ciudad')->first();
                            if($via==0){
                                $inser=Via::insert(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi,'nomvia'=>$vias,'ciu'=>$idc]);

                                $idvia=via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                if($senm==0){
                                    $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                    $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                    $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr[0]]);

                                    return redirect()->route('listUbication')
                                    ->with('info');
                                }else{
                                    $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                    foreach ($aux1 as $aut) {
                                        dd('todo esta 5');
                                        if ($aut->estado=='Desactivado'&& $aut->activo==false) {
                                            dd('todo esta 6');
                                            $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                            return redirect()->route('listUbication')
                                                        ->with('info');
                                        } else {
                                            return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                        }
                                    }
                                }
                            }else{
                                $idvia= via::join('ciudad','id_ciudad','ciu')->where('via.nomvia','=',$vias)->where('ciudad.depa','=',$depa)->pluck('id_via')->first();
                                $selcVia=Via::where('id_via','=',$idvia)->select('via.id_via','via.tipo','via.nuncarril','via.dimension','via.clacificacion')->get();
                              foreach($selcVia as $selc){
                                dd('todo esta 8');
                                if($selc->tipo==$tipo && $selc->nuncarril==$carri && $selc->dimension==$dime && $selc->clascificacion==$clasi){
                                    dd('todo esta 9');
                                    if($senm==0){dd('todo esta 10');
                                        $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                        $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                        $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                        return redirect()->route('listUbication')
                                        ->with('info');
                                    }else{
                                        $viaI=Via::where('via.id_via','=',$idvia)->update(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi]);
                                        $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                        foreach ($aux1 as $aut) {dd('todo esta 12');
                                            if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 13');
                                                $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                                return redirect()->route('listUbication')
                                                ->with('info');
                                            } else {
                                                return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                            }
                                        }
                                    }

                                }  else {
                                    $updV=Via::where('id_via','=',$selc->id_via)->update(['tipo'=>$tipo,'nuncarril'=>$carri,'dimension'=>$dime,'clacificacion'=>$clasi]);
                                    if($senm==0){dd('todo esta 15');
                                        $insert=Sensor::insert(['estado'=>'Activo','nombre'=>$name,'activo'=>1]);
                                        $idse=Sensor::where('nombre','=',$name)->pluck('id_sensor')->first();
                                        $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$idse,'via_id'=>$idvia,'usr_id'=>$idusr[0]]);

                                        return redirect()->route('listUbication')
                                        ->with('info');
                                    }else{
                                        $aux1=Sensor::where('nombre','=',$name)->select('id_sensor','nombre','estado','activo')->get();
                                        foreach ($aux1 as $aut) {dd('todo esta 17');
                                            if ($aut->estado=='Desactivado'&& $aut->activo==false) {dd('todo esta 18');
                                                $insU=ubicacion::insert(['activo'=>$atc,'foto'=>$loca,'id_disp'=>$aut->id_sensor,'via_id'=>$idvia,'usr_id'=>$idusr]);

                                                return redirect()->route('listUbication')
                                                ->with('info');
                                            } else {
                                                return back()->with('Mensaje', 'El Sensor esta regitrado y en funcionamiento');
                                            }
                                        }
                                    }

                                }
                                }
                            }