/*
 * Author: Carson Perry
 * Class: CST-247
 * Date: 8/8/21
 */

using CST247_Benchmark.Models;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Threading.Tasks;

namespace CST247_Benchmark.Services
{
    public class BibleDataService
    {
        private string sqlConn = @"Data Source=(localdb)\MSSQLLocalDB;Initial Catalog=Bible;Integrated Security=True;Connect Timeout=30;Encrypt=False;TrustServerCertificate=False;ApplicationIntent=ReadWrite;MultiSubnetFailover=False";

        public BibleVerseModel getVerseByVerbage(int b, int c, int v)
        {
            string sqlStatement = "SELECT * FROM dbo.t_kjv WHERE b = @book AND c = @chap AND v = @verse";

            using (SqlConnection connection = new SqlConnection(sqlConn))
            {
                SqlCommand command = new SqlCommand(sqlStatement, connection);

                command.Parameters.Add("@book", System.Data.SqlDbType.Int).Value = b;
                command.Parameters.Add("@chap", System.Data.SqlDbType.Int).Value = c;
                command.Parameters.Add("@verse", System.Data.SqlDbType.Int).Value = v;


                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        while (reader.Read())
                        {
                            BibleVerseModel verse = new BibleVerseModel((int)reader[0], (int)reader[1], (int)reader[2], (int)reader[3], (string)reader[4]);
                            return verse;
                        }
                    }

                    else
                    {
                        return null;
                    }


                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    System.Diagnostics.Debug.WriteLine(e.Message);
                }
            }
            return null;
        }

        public BibleVerseModel getVerseByID(int ID)
        {
            string sqlStatement = "SELECT * FROM dbo.t_kjv WHERE id = @id";

            using (SqlConnection connection = new SqlConnection(sqlConn))
            {
                SqlCommand command = new SqlCommand(sqlStatement, connection);

                command.Parameters.Add("@id", System.Data.SqlDbType.Int).Value = ID;


                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        while (reader.Read())
                        {
                            BibleVerseModel verse = new BibleVerseModel((int)reader[0], (int)reader[1], (int)reader[2], (int)reader[3], (string)reader[4]);
                            return verse;
                        }
                    }

                    else
                    {
                        return null;
                    }


                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    System.Diagnostics.Debug.WriteLine(e.Message);
                }
            }
            return null;
        }

        public List<BibleVerseModel> getBookVerses(int b)
        {
            string sqlStatement = "SELECT * FROM dbo.t_kjv WHERE b = @book";

            using (SqlConnection connection = new SqlConnection(sqlConn))
            {
                SqlCommand command = new SqlCommand(sqlStatement, connection);

                command.Parameters.Add("@book", System.Data.SqlDbType.Int).Value = b;


                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        List<BibleVerseModel> verses = new List<BibleVerseModel>();
                        while (reader.Read())
                        {
                            BibleVerseModel verse = new BibleVerseModel((int)reader[0], (int)reader[1], (int)reader[2], (int)reader[3], (string)reader[4]);
                            verses.Add(verse);
                        }
                        return verses;
                    }

                    else
                    {
                        return null;
                    }


                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    System.Diagnostics.Debug.WriteLine(e.Message);
                }
            }
            return null;
        }

        public List<BibleVerseModel> getChapterVerses(int b, int c)
        {
            string sqlStatement = "SELECT * FROM dbo.t_kjv WHERE b = @book AND c = @chap";

            using (SqlConnection connection = new SqlConnection(sqlConn))
            {
                SqlCommand command = new SqlCommand(sqlStatement, connection);

                command.Parameters.Add("@book", System.Data.SqlDbType.Int).Value = b;
                command.Parameters.Add("@chap", System.Data.SqlDbType.Int).Value = c;


                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        List<BibleVerseModel> verses = new List<BibleVerseModel>();
                        while (reader.Read())
                        {
                            BibleVerseModel verse = new BibleVerseModel((int)reader[0], (int)reader[1], (int)reader[2], (int)reader[3], (string)reader[4]);
                            verses.Add(verse);
                        }
                        return verses;
                    }

                    else
                    {
                        return null;
                    }


                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    System.Diagnostics.Debug.WriteLine(e.Message);
                }
            }
            return null;
        }
        //No longer needed as I have that helper method in the BibleController that does this, but for any search
        public List<BibleVerseModel> getVersesByText(string key)
        {
            System.Diagnostics.Debug.WriteLine(key);
            string sqlStatement = "SELECT * FROM dbo.t_kjv WHERE t LIKE @k";

            using (SqlConnection connection = new SqlConnection(sqlConn))
            {
                SqlCommand command = new SqlCommand(sqlStatement, connection);
                string wild = "%" + key + "%";

                command.Parameters.AddWithValue("@k", '%' + key + '%');

                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        List<BibleVerseModel> verses = new List<BibleVerseModel>();
                        while (reader.Read())
                        {
                            BibleVerseModel verse = new BibleVerseModel((int)reader[0], (int)reader[1], (int)reader[2], (int)reader[3], (string)reader[4]);
                            verses.Add(verse);
                        }
                        return verses;
                    }
                    else
                    {
                        return null;
                    }
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                }
            }
            return null;
        }

        public List<BibleVerseModel> getVersesByChapText(int b, int c, string key)
        {
            string sqlStatement = "SELECT * FROM dbo.t_kjv WHERE b = @book AND c = @chap AND t LIKE '@k'";

            using (SqlConnection connection = new SqlConnection(sqlConn))
            {
                SqlCommand command = new SqlCommand(sqlStatement, connection);
                key = "%" + key + "%";

                command.Parameters.Add("@k", System.Data.SqlDbType.Int).Value = key;
                command.Parameters.Add("@chap", System.Data.SqlDbType.Int).Value = c;

                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        List<BibleVerseModel> verses = new List<BibleVerseModel>();
                        while (reader.Read())
                        {
                            BibleVerseModel verse = new BibleVerseModel((int)reader[0], (int)reader[1], (int)reader[2], (int)reader[3], (string)reader[4]);
                            verses.Add(verse);
                        }
                        return verses;
                    }
                    else
                    {
                        return null;
                    }
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    System.Diagnostics.Debug.WriteLine(e.Message);
                }
            }
            return null;
        }
        //Gets all the books from the Old Testament
        public List<BibleVerseModel> getOldTestament()
        {
            string sqlStatement = "SELECT * FROM dbo.t_kjv WHERE b < 40 AND c = 1 AND v = 1";

            using (SqlConnection connection = new SqlConnection(sqlConn))
            {
                SqlCommand command = new SqlCommand(sqlStatement, connection);

                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        List<BibleVerseModel> verses = new List<BibleVerseModel>();
                        while (reader.Read())
                        {
                            BibleVerseModel verse = new BibleVerseModel((int)reader[0], (int)reader[1], (int)reader[2], (int)reader[3], (string)reader[4]);
                            verses.Add(verse);
                        }
                        return verses;
                    }
                    else
                    {
                        return null;
                    }
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    System.Diagnostics.Debug.WriteLine(e.Message);
                }
            }
            return null;
        }
        //Gets all the books from the New Testament
        public List<BibleVerseModel> getNewTestament()
        {
            string sqlStatement = "SELECT * FROM dbo.t_kjv WHERE b > 39 AND c = 1 AND v = 1";

            using (SqlConnection connection = new SqlConnection(sqlConn))
            {
                SqlCommand command = new SqlCommand(sqlStatement, connection);

                try
                {
                    connection.Open();
                    SqlDataReader reader = command.ExecuteReader();

                    if (reader.HasRows)
                    {
                        List<BibleVerseModel> verses = new List<BibleVerseModel>();
                        while (reader.Read())
                        {
                            BibleVerseModel verse = new BibleVerseModel((int)reader[0], (int)reader[1], (int)reader[2], (int)reader[3], (string)reader[4]);
                            verses.Add(verse);
                        }
                        return verses;
                    }
                    else
                    {
                        return null;
                    }
                }
                catch (Exception e)
                {
                    Console.WriteLine(e.Message);
                    System.Diagnostics.Debug.WriteLine(e.Message);
                }
            }
            return null;
        }
    }
}
