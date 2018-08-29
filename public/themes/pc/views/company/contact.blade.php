<div class="header-bg">
    <div class="w1200 fb-position-relative">
        <p>关于我们</p>
    </div>
</div>
<div class="newList">
    <div class="w1200">
        <div class="goodList-title">
            <div class="w1200 fb-clearfix">
                <p>联系我们</p>
            </div>
        </div>
        <div class="contact">
            <form action="" id="contact_form">
                <ul class="mfields">
                    <li>
                        <div class="c-title" style="padding-top: 8px;">你的名字<span class="reqtip">*</span></div>
                        <div class="inpbox" style="position: relative;"><input type="text" name="name" class="inptext error" maxlength="50" required="" aria-required="true" aria-invalid="true"><span class="requiredtip" style="top:40px;">该字段是必填项<span class="tipshadow"></span><span class="pointytip"></span></span>
                        </div>
                        <div style="clear:both;overflow:hidden;"></div>
                    </li>

                    <li>
                        <div class="c-title" style="padding-top: 8px;">电子邮件地址<span class="reqtip">*</span></div>
                        <div class="inpbox" style="position: relative;"><input type="text" name="email" class="inptext error" data-rule-email="true" maxlength="50" required="" aria-required="true"><span class="requiredtip" style="top:40px;">该字段是必填项<span class="tipshadow"></span><span class="pointytip"></span></span>
                        </div>
                        <div style="clear:both;overflow:hidden;"></div>
                    </li>

                    <li>
                        <div class="c-title" style="padding-top: 8px;">确认您的电子邮件地址<span class="reqtip">*</span></div>
                        <div class="inpbox" style="position: relative;"><input type="text" name="reemail" class="inptext error" data-rule-email="true" maxlength="50" required="" aria-required="true"><span class="requiredtip" style="top:40px;">该字段是必填项<span class="tipshadow"></span><span class="pointytip"></span></span>
                        </div>
                        <div style="clear:both;overflow:hidden;"></div>
                    </li>

                    <li>
                        <div class="c-title" style="padding-top: 8px;">电话号码<span class="reqtip">*</span></div>
                        <div class="inpbox" style="position: relative;"><input type="text" name="tel" class="inptext error" data-rule-mobile="true" maxlength="50" required="" aria-required="true"><span class="requiredtip" style="top:40px;">该字段是必填项<span class="tipshadow"></span><span class="pointytip"></span></span>
                        </div>
                        <div style="clear:both;overflow:hidden;"></div>
                    </li>

                    <li>
                        <div class="c-title" style="padding-top: 8px;">国家（城市）<span class="reqtip">*</span></div>
                        <div class="inpbox" style="position: relative;"><input type="text" name="location" class="inptext error" maxlength="50" required="" aria-required="true"><span class="requiredtip" style="top:40px;">该字段是必填项<span class="tipshadow"></span><span class="pointytip"></span></span>
                        </div>
                        <div style="clear:both;overflow:hidden;"></div>
                    </li>

                    <li>
                        <div class="c-title" style="padding-top: 24px;">您的询问内容<span class="reqtip">*</span></div>
                        <div class="inpbox" style="position: relative;"><textarea name="content" class="txtarea error" maxlength="500" required="" aria-required="true"></textarea><span class="requiredtip" style="top:72px;">该字段是必填项<span class="tipshadow"></span><span class="pointytip"></span></span>
                        </div>
                        <div style="clear:both;overflow:hidden;"></div>
                    </li>

                </ul>
                {!!Form::token()!!}
                <input type="submit" class="btn-submit fb-transition" value="提交"/>
            </form>
            <div class="contact-con">
                <div class="contact-item contact-item1 fb-inlineBlock">
                    <p>公司地址</p>
                    <span>{{ setting('address') }}</span>
                </div>
                <div class="contact-item contact-item2 fb-inlineBlock">
                    <p>联系电话</p>
                    <span>{{ setting('tel') }}</span>
                </div>
                <div class="contact-item contact-item3 fb-inlineBlock">
                    <p>邮箱地址</p>
                    <span>{{ setting('email') }}</span>
                </div>
                <div class="contact-item contact-item4 fb-inlineBlock">
                    <p>联系客服</p>
                    <span>客服  QQ：{{ setting('qq') }}<br>客服手机：{{ setting('phone') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $("#contact_form").submit(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ url('company/questionStore') }}",
                data: $("#contact_form").serialize(),
                dataType: 'json',
                success: function(data){
                    alert(data.message);
                },
                error: function(xhr, type){

                }
            });
        })
    })

</script>