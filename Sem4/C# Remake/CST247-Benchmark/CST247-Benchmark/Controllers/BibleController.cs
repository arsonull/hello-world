/*
 * Author: Carson Perry
 * Class: CST-247
 * Date: 8/8/21
 */

using CST247_Benchmark.Models;
using CST247_Benchmark.Services;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CST247_Benchmark.Controllers
{
    public class BibleController : Controller
    {
        public IActionResult Index()
        {
            return View();
        }

        public IActionResult Search()
        {
            return View();
        }

        //Not used. Due to formatting of the ID from the database, viewing the individual verse from a list has to be done unconventionally, and this was my attempt, though it would always pass with 3 0's
        public IActionResult viewVerse(int book, int chap, int verse)
        {
            System.Diagnostics.Debug.WriteLine("" + book + ", " + chap + ", " + verse);
            BibleBusinessService biz = new BibleBusinessService();
            BibleVerseModel temp = biz.getVerseByVerbage(book, chap, verse);
            return View("Verse", temp);
        }
        //one process search to rule them all. This deals with every logical search you would want for this kind of website
        [HttpPost]
        public IActionResult processSearch(BibleVerseModel input)
        {
            try
            {
                System.Diagnostics.Debug.WriteLine("Howdy");
                BibleBusinessService biz = new BibleBusinessService();
                List<BibleVerseModel> verses = new List<BibleVerseModel>();
                if (input.bookNumber > 0 && input.bookNumber < 67)
                {
                    if (input.chapter > 0)
                    {
                        if (input.verse > 0)
                        {
                            input = biz.getVerseByVerbage(input.bookNumber, input.chapter, input.verse);
                            System.Diagnostics.Debug.WriteLine("Verbage");
                            return View("Verse", input);
                        }
                        else
                        {
                            verses = biz.getChapterVerse(input.bookNumber, input.chapter);
                            System.Diagnostics.Debug.WriteLine("Chapter");
                            verses = searchList(verses, input.text);
                            if (verses == null)
                                return View("Error");
                            return View("Verses", verses);
                        }
                        /*else
                        {
                            System.Diagnostics.Debug.WriteLine("ChapterText with: " + input.text);
                            verses = biz.getVersesByChapText(input.bookNumber, input.chapter, input.text);
                            return View("Verses", verses);
                        }*/
                    }
                    else
                    {
                        verses = biz.getBookVerses(input.bookNumber);
                        System.Diagnostics.Debug.WriteLine("Book");
                        verses = searchList(verses, input.text);
                        if (verses == null)
                            return View("Error");
                        return View("Verses", verses);
                    }
                }
                else if (input.text != null)
                {
                    System.Diagnostics.Debug.WriteLine("Search key: " + input.text);
                    verses = biz.getVersesByText(input.text);
                    verses = searchList(verses, input.text);
                    if (verses == null)
                        return View("Error");
                    return View("Verses", verses);
                }

                else if (input.testament != null)
                {
                    if (input.testament == "Old Testament")
                    {
                        System.Diagnostics.Debug.WriteLine("Old Test");
                        verses = biz.getTestamentVerses(0);
                    }
                    else if (input.testament == "New Testament")
                    {
                        System.Diagnostics.Debug.WriteLine("New test");
                        verses = biz.getTestamentVerses(1);
                    }
                    else
                        return View("Search");
                    System.Diagnostics.Debug.WriteLine("End of Test");
                    verses = searchList(verses, input.text);
                    if (verses == null)
                        return View("Error");

                    return View("Verses", verses);
                }

                return View("Error");
            }
            catch(Exception e)
            {
                return View("Error");
            }
        }

        //Realized I could instead run through the list of Verses that I retrieve to filter ANY kind of search I do, rather than just a search for everything in the entire Bible filtered with a key or phrase
        private List<BibleVerseModel> searchList(List<BibleVerseModel> verses, string key)
        {
            try
            {
                if (key != null && key != "" && key != " ")
                {
                    List<BibleVerseModel> tempList = new List<BibleVerseModel>();
                    foreach (BibleVerseModel verse in verses)
                    {
                        if (verse.text.Contains(key))
                            tempList.Add(verse);
                    }
                    return tempList;
                }
                return verses;
            }
            catch (Exception e)
            {
                return null;
            }
        }
    }
}
