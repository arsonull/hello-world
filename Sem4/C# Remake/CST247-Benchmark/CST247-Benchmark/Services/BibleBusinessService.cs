/*
 * Author: Carson Perry
 * Class: CST-247
 * Date: 8/8/21
 */

using CST247_Benchmark.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CST247_Benchmark.Services
{
    public class BibleBusinessService
    {
        BibleDataService DAO = new BibleDataService();

        public BibleVerseModel getVerseByVerbage(int b, int c, int v)
        {
            return DAO.getVerseByVerbage(b, c, v);
        }

        public List<BibleVerseModel> getBookVerses(int b)
        {
            List<BibleVerseModel> verses = DAO.getBookVerses(b);
            //System.Diagnostics.Debug.WriteLine("" + verses.Count);
            return verses;
        }

        public List<BibleVerseModel> getChapterVerse(int b, int c)
        {
            List<BibleVerseModel> verses = DAO.getChapterVerses(b, c);
            //System.Diagnostics.Debug.WriteLine("" + verses.Count);
            return verses;
        }

        public List<BibleVerseModel> getVersesByText(string key)
        {
            System.Diagnostics.Debug.WriteLine(key + " 1");
            List<BibleVerseModel> verses = DAO.getVersesByText(key);
            //System.Diagnostics.Debug.WriteLine("" + verses.Count);
            return verses;
        }

        public List<BibleVerseModel> getVersesByChapText(int b, int c, string key)
        {
            List<BibleVerseModel> verses = DAO.getVersesByChapText(b, c, key);
            //System.Diagnostics.Debug.WriteLine("" + verses.Count);
            return verses;
        }

        public List<BibleVerseModel> getTestamentVerses(int t)
        {
            List<BibleVerseModel> verses = new List<BibleVerseModel>();
            if (t == 0)
            {
                verses = DAO.getOldTestament();
                //System.Diagnostics.Debug.WriteLine("" + verses.Count);
                return verses;
            }
            else
            {
                verses = DAO.getNewTestament();
                //System.Diagnostics.Debug.WriteLine("" + verses.Count);
                return verses;
            }
        }

        public BibleVerseModel getVerseByID (int ID)
        {
            return DAO.getVerseByID(ID);
        }
    }
}
