#pragma checksum "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml" "{ff1816ec-aa5e-4d10-87f7-6f4963833460}" "74e5d9684b832322712f39770ed5828925c06c3b"
// <auto-generated/>
#pragma warning disable 1591
[assembly: global::Microsoft.AspNetCore.Razor.Hosting.RazorCompiledItemAttribute(typeof(AspNetCore.Views_Products__productCard), @"mvc.1.0.view", @"/Views/Products/_productCard.cshtml")]
namespace AspNetCore
{
    #line hidden
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading.Tasks;
    using Microsoft.AspNetCore.Mvc;
    using Microsoft.AspNetCore.Mvc.Rendering;
    using Microsoft.AspNetCore.Mvc.ViewFeatures;
#nullable restore
#line 1 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\_ViewImports.cshtml"
using ASPCoreFirstApp;

#line default
#line hidden
#nullable disable
#nullable restore
#line 2 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\_ViewImports.cshtml"
using ASPCoreFirstApp.Models;

#line default
#line hidden
#nullable disable
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"74e5d9684b832322712f39770ed5828925c06c3b", @"/Views/Products/_productCard.cshtml")]
    [global::Microsoft.AspNetCore.Razor.Hosting.RazorSourceChecksumAttribute(@"SHA1", @"0b2b2fd52782326d29737e320991a6472bcb6832", @"/Views/_ViewImports.cshtml")]
    public class Views_Products__productCard : global::Microsoft.AspNetCore.Mvc.Razor.RazorPage<ASPCoreFirstApp.Models.ProductModel>
    {
        #pragma warning disable 1998
        public async override global::System.Threading.Tasks.Task ExecuteAsync()
        {
            WriteLiteral("\r\n\r\n<div");
            BeginWriteAttribute("id", " id=\"", 52, "\"", 76, 2);
            WriteAttributeValue("", 57, "prod-card-", 57, 10, true);
#nullable restore
#line 4 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
WriteAttributeValue("", 67, Model.Id, 67, 9, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"card\" style=\"width:18rem; margin:5px;\">\r\n");
#nullable restore
#line 5 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
      
        var s = Model.Name;
        var firstWord = s.IndexOf(" ") > -1 ? s.Substring(0, s.IndexOf(" ")) : s;
    

#line default
#line hidden
#nullable disable
            WriteLiteral("    <img");
            BeginWriteAttribute("src", " src=\"", 261, "\"", 324, 4);
            WriteAttributeValue("", 267, "https://loremflickr.com/160/120/", 267, 32, true);
#nullable restore
#line 9 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
WriteAttributeValue("", 299, firstWord, 299, 10, false);

#line default
#line hidden
#nullable disable
            WriteAttributeValue("", 309, "?lock=", 309, 6, true);
#nullable restore
#line 9 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
WriteAttributeValue("", 315, Model.Id, 315, 9, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"card-img-top\" />\r\n    <div class=\"card-body\">\r\n        <h5 class=\"card-title\">");
#nullable restore
#line 11 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
                          Write(Model.Name);

#line default
#line hidden
#nullable disable
            WriteLiteral("</h5>\r\n\r\n        <p class=\"card-text\">");
#nullable restore
#line 13 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
                        Write(Html.DisplayFor(modelModel => Model.Price));

#line default
#line hidden
#nullable disable
            WriteLiteral("</p>\r\n        <p class=\"card-text\">");
#nullable restore
#line 14 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
                        Write(Html.DisplayFor(modelModel => Model.Description));

#line default
#line hidden
#nullable disable
            WriteLiteral("</p>\r\n        <a");
            BeginWriteAttribute("href", " href=\"", 603, "\"", 644, 2);
            WriteAttributeValue("", 610, "/products/ShowOneProduct/", 610, 25, true);
#nullable restore
#line 15 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
WriteAttributeValue("", 635, Model.Id, 635, 9, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"btn btn-primary\">View Product</a>\r\n");
            WriteLiteral("\r\n        <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#exampleModal\">\r\n            Edit\r\n        </button>\r\n\r\n        <a");
            BeginWriteAttribute("href", " href=\"", 934, "\"", 974, 2);
            WriteAttributeValue("", 941, "/products/DeleteProduct/", 941, 24, true);
#nullable restore
#line 22 "C:\Users\spart\Documents\GitHub\arsonull.github.io\Sem4\C# Remake\act5\ASPCoreFirstApp\ASPCoreFirstApp\Views\Products\_productCard.cshtml"
WriteAttributeValue("", 965, Model.Id, 965, 9, false);

#line default
#line hidden
#nullable disable
            EndWriteAttribute();
            WriteLiteral(" class=\"btn btn-danger\">Delete</a>\r\n    </div>\r\n</div>");
        }
        #pragma warning restore 1998
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.ViewFeatures.IModelExpressionProvider ModelExpressionProvider { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IUrlHelper Url { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.IViewComponentHelper Component { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IJsonHelper Json { get; private set; }
        [global::Microsoft.AspNetCore.Mvc.Razor.Internal.RazorInjectAttribute]
        public global::Microsoft.AspNetCore.Mvc.Rendering.IHtmlHelper<ASPCoreFirstApp.Models.ProductModel> Html { get; private set; }
    }
}
#pragma warning restore 1591
