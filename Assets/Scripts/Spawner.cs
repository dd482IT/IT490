using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Spawner : MonoBehaviour
{
    public GameObject[] rockPatterns;
    public GameObject[] coins;

    private float coinTimeBetweenSpawn;
    private float coinStartTimeBetweenSpawn = 2f;

    public float timeBewteenChange;
    public float startTimeBewteenChange = 2f;

    public int coinChance = 3;

    public float distanceBetween = 5;
    
    private int i = 0;
    private void OnTriggerEnter2D(Collider2D other)
    {
        if (other.CompareTag("Obstacle"))
        {
                i++;
        }
    }

    private void Start()
    {
        var where = transform.position;
        where.x += distanceBetween;
        int rand = Random.Range(0, rockPatterns.Length);
        Instantiate(rockPatterns[rand], where, Quaternion.identity);
    }


    private void Update()
    {
        if (i == 2)
        {
            var where = transform.position;
            where.x += distanceBetween;
            int rand = Random.Range(0, rockPatterns.Length);
            Instantiate(rockPatterns[rand], where, Quaternion.identity);
            i = 0;
        }

        if (timeBewteenChange <= 0)
        {
            timeBewteenChange = startTimeBewteenChange;
            if (distanceBetween > 8)
            {
                distanceBetween -= .2f;
            }
         else
            {
                timeBewteenChange -= Time.deltaTime;
            }     
        }

        if (coinTimeBetweenSpawn <= 0)
        {
            coinTimeBetweenSpawn = coinStartTimeBetweenSpawn;
            if (Random.Range(0, coinChance) == 1)
            {
                int rand2 = Random.Range(0, coins.Length);
                Instantiate(coins[rand2], transform.position, Quaternion.identity);
            }
        }
        else
        {
            coinTimeBetweenSpawn -= Time.deltaTime;
        }
    }
}
