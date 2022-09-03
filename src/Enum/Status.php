<?php

namespace App\Enum;

enum Status: String
{
    case Draft = "draft";
    case Published = "published";
    case Faq = "faq";
    case Bot = "bot";
}