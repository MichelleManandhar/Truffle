/* --- functions for merge --- */
    /*
        function merge($this) {
                var ids = [];
                var occupied_head = false;
                var occupied_table = false;
                var self_head = false;
                var self_table = false;
                var merge_head = false;
                var merge_table = false;
                
                var $area = $this.parents('.drag-area');
                var count = $area.find('.drag-table').length;

                for (i = 0; i < count; i++) {
                    var $current = $area.find('.drag-table:eq(' + i + ')');
                    var a = $this.find('.tb-detail-table').val();
                    var b = $current.find('.tb-detail-table').val();

                    if ($current.length == 1 && a != b) {
                        if ( collision( $current, $this ) ) {
                            if ($this.hasClass('occupied-table')) {
                                occupied_head = true;
                                var head_id = $this.find('.tb-detail-table').val();
                                if ($current.hasClass('occupied-table')) {
                                    typeAlert('Error!', 'Can not merge with already occupied tables.', 'error'); 
                                    clean_merge_head($this, head_id, false);
                                    return false;
                                }
                                else if ($current.hasClass('merge-head')) {
                                    typeAlert('Error!', 'Can not merge with already merged tables.', 'error');
                                    clean_merge_head($this, head_id, false);
                                    return false;
                                }
                                else if ($current.hasClass('merge-table')) {
                                    var head = $current.find('.tb-detail-merge-head').val();
                                    if (head != head_id) {
                                        typeAlert('Error!', 'Can not merge with already merged tables.', 'error');
                                        clean_merge_head($this, head_id, false);
                                        return false;
                                    }
                                }
                                
                                ids.push(b);
                            }
                            else if ($this.hasClass('merge-head')) {
                                self_head = true;
                                var head_id = $this.find('.tb-detail-table').val();
                                if ($current.hasClass('occupied-table')) {
                                    typeAlert('Error!', 'Can not merge with already occupied tables.', 'error'); 
                                    clean_merge_head($this, head_id, false);
                                    return false;
                                }
                                else if ($current.hasClass('merge-head')) {
                                    typeAlert('Error!', 'Can not merge with already merged tables.', 'error');
                                    clean_merge_head($this, head_id, false);
                                    return false;
                                }
                                else if ($current.hasClass('merge-table')) {
                                    var head = $current.find('.tb-detail-merge-head').val();
                                    if (head != head_id) {
                                        typeAlert('Error!', 'Can not merge with already merged tables.', 'error');
                                        clean_merge_head($this, head_id, false);
                                        return false;
                                    }
                                }
                                
                                ids.push(b);
                            }
                            else if ($this.hasClass('merge-table')) {
                                self_table = true;
                                var head_id = $this.find('.tb-detail-merge-head').val();
                                if ($current.hasClass('occupied-table')) {
                                    typeAlert('Error!', 'Can not merge with already occupied tables.', 'error'); return false;
                                }
                                else if ($current.hasClass('merge-head')) {
                                    var head = $current.find('.tb-detail-table').val();
                                    if (head != head_id) {
                                        typeAlert('Error!', 'Can not merge with already merged tables.', 'error'); return false;
                                    }
                                }
                                else if ($current.hasClass('merge-table')) {
                                    var head = $current.find('.tb-detail-merge-head').val();
                                    if (head != head_id) {
                                        typeAlert('Error!', 'Can not merge with already merged tables.', 'error'); return false;
                                    }
                                }
                                
                                ids.push(b);
                            }
                            else {
                                if ($current.hasClass('occupied-table')) {
                                    occupied_table = true;
                                    $head = $current;
                                    ids.push(a);
                                }
                                else if ($current.hasClass('merge-head') && merge_head == false) {
                                    merge_head = true;
                                    $head = $current;
                                    ids.push(a);
                                }
                                else if ($current.hasClass('merge-table')) {
                                    if (merge_head == false) {
                                        ids.push(a);
                                        $table = $current;
                                        merge_table = true;
                                    }
                                    else {
                                        merge_table = false;
                                    }
                                    ids.push(b);
                                }
                                else {
                                    ids.push(b);
                                }
                            }
                        }
                    }

                    if (i == count-1) {
                        if (occupied_head) {
                            var head_id = $this.find('.tb-detail-table').val();
                            clean_merge_head($this, head_id, false);
                            merge_effect($this, ids, head_id, false);
                        }
                        else if (occupied_table) {
                            var head_id = $head.find('.tb-detail-table').val();
                            merge_effect($head, ids, head_id, true);
                        }
                        else if (self_head) {
                            var head_id = $this.find('.tb-detail-table').val();
                            clean_merge_head($this, head_id, false);
                            merge_effect($this, ids, head_id, false);
                        }
                        else if (self_table) {
                            var head_id = $this.find('.tb-detail-merge-head').val();
                            $head = $('#table-'+parseInt(head_id));
                            merge_effect($head, ids, head_id, true);
                        }
                        else if (merge_head) {
                            var head_id = $head.find('.tb-detail-table').val();
                            merge_effect($head, ids, head_id, true);
                        }
                        else if (merge_table) {
                            head_id = $table.find('.tb-detail-merge-head').val();
                            $head = $('#table-'+parseInt(head_id));
                            merge_effect($head, ids, head_id, true); 
                        } 
                        else {
                            var head_id = $this.find('.tb-detail-table').val();
                            merge_effect($this, ids, head_id, true);
                        }
                    }
                } 
        }

        function merge_effect($this, ids, head_id, bool) { 
            
            if (ids != null && ids.length > 0) { 
                $.each( ids, function(index, value) {
                    var $table = $('#table-'+parseInt(value)); 
                    $table.not('.merge-head').removeClass('drag-table-options').addClass('merge-table');
                    $table.not('.merge-head').find('.tb-detail-merge-head').val(head_id);
                });
                $this.not('.merge-table').addClass('merge-head');

                if (bool == true) {
                    hit_db_for_merge($this, ids, head_id);
                }
                else if (bool == false) {
                    hit_db_for_merge_replace_value($this, ids, head_id);
                }
            }
            else {
               clean_merge_head($this, head_id, true);
            }
        }

        function check_merge_table_escape($this) {
            var check = false;
            $('.hidden-merge-vault').val('');
            head_id = $this.find('.tb-detail-merge-head').val();
            $head = $('#table-'+parseInt(head_id));
            
            var ids = $head.find('.tb-detail-merge').val().trim(); 
            if (ids != null && ids != '[]' && ids != '') { 
                var data = $.parseJSON(ids);

                $.each( data, function(index, value) {
                    var $table = $('#table-'+parseInt(value)); 
                    $table.addClass('drag-table-options').removeClass('merge-table');
                    $table.find('.tb-detail-merge-head').val(0);

                    if ( collision( $table, $head ) ) {
                        check = true;
                        $table.removeClass('drag-table-options').addClass('merge-table').addClass('merge-table-done');
                        $table.find('.tb-detail-merge-head').val(head_id);
                        save_to_merge_vault(value);
                        check_in_merge_table($table, head_id);
                    }

                    if (index == data.length-1) {
                        $('.drag-table').removeClass('merge-table-done');
                        if (!check) {
                            clean_merge_head($head, head_id, true);
                        }
                        else {
                            var ids = '';
                            var new_id = $('.hidden-merge-vault').val();
                            if (new_id != null && new_id != '[]' && new_id != '') { 
                                var ids = $.parseJSON(new_id);
                            }
                            hit_db_for_merge_replace_value($head, ids, head_id);
                        }
                    }
                });
            }
            else {
                clean_merge_head($head, head_id, true);
            }
        }

        function check_in_merge_table($table, head_id) { 
            var $area = $table.parents('.drag-area');
            $area.find('.drag-table').not('.merge-head').not('.merge-table-done').each( function(index, value) {
                var $this = $(this);
                
                if ( collision( $this, $table ) ) {
                    $this.removeClass('drag-table-options').addClass('merge-table').addClass('merge-table-done');
                    $this.find('.tb-detail-merge-head').val(head_id);
                    save_to_merge_vault($this.find('.tb-detail-table').val());
                    check_in_merge_table($this, head_id)
                }
            });
        }

        function save_to_merge_vault(id) {
            var i = 0;
            var idX = [];
            var $vault = $('.hidden-merge-vault');
            var data = $vault.val().trim();

            if(data != '' && data != null) {
                var idX = $.parseJSON(data);
                i = idX.length;
            }

            idX[i] = id; 
            $vault.val(JSON.stringify(idX));
        }

        function clean_merge_head($this, head_id, bool) { 
            var ids = $this.find('.tb-detail-merge').val().trim(); 
            if (ids != null && ids != '[]' && ids != '') { 
                var data = $.parseJSON(ids);
                $.each( data, function(index, value) {
                    var $table = $('#table-'+parseInt(value)); 
                    $table.addClass('drag-table-options').removeClass('merge-table');
                    $table.find('.tb-detail-merge-head').val(0);
                });
                hit_db_for_merge_head_clear($this, head_id);
            
                $.ajax({
                    type : 'POST',
                    url  : baseUrl + '/table/unmerge-sync',
                    async: false
                });
            }
            if (bool) {
                $this.removeClass('merge-head');
            } 
        }

        function merge_head() {
            $('.merge-head').each( function (e) {
                var $this = $(this);
                var head_id = $this.find('.tb-detail-table').val(); 
                var ids = $this.find('.tb-detail-merge').val().trim(); 
                if (ids != null && ids != '[]' && ids != '') { 
                    var data = $.parseJSON(ids);
                    merge_effect($this, data, head_id, 'not');
                }
            });
        }

        function hit_db_for_merge($this, ids, head_id) {
            $.ajax({
                url: baseUrl + '/table/merge-table',
                type: 'POST',
                data: {table_id:head_id, id: ids},
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    } else {
                        if (data.status == 'success') {
                            $this.find('.tb-detail-merge').val(data.merge);
                            merge_head();
                        }
                        else if (data.status == 'error') { 
                            typeAlert('Error!', data.error, 'warning'); return false;
                        }
                        else {
                        
                        }
                    }
                }
            });
        }

        function hit_db_for_merge_replace_value($this, ids, head_id) {
            $.ajax({
                url: baseUrl + '/table/merge-table-replace-value',
                type: 'POST',
                data: {table_id:head_id, id: ids},
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    } else {
                        if (data != false && data.merge != null) {
                            $this.find('.tb-detail-merge').val(data.merge);
                            merge_head();
                        }
                    }
                }
            });
        }

        function hit_db_for_merge_head_clear($this, head_id) {
            $.ajax({
                url: baseUrl + '/table/merge-head-clear',
                type: 'POST',
                data: {table_id:head_id},
                async: false,
                success: function (response) {
                    var data = $.parseJSON(response);
                    if(data.status == 'logout') {
                        window.location.href = baseUrl + '/site/logout';
                    } else {
                        if (data != false) {
                            $this.find('.tb-detail-merge').val('');
                            merge_head();
                        }
                    }
                }
            });
        }
        
        merge_head();
    */
    /* --- functions for merge --- */