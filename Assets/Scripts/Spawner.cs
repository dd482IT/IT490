using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Spawner : MonoBehaviour
{
    public GameObject[] rockPatterns;
    public GameObject[] coins;

    private float timeBetweenSpawn;
    public float startTimeBetweenSpawn = 1.75f;

    public float decreaseTime;
    public float minTime = 1f;

    public int coinChance = 3;

    private void Update()
    {
       

        if (timeBetweenSpawn <= 0)
        {
            int rand = Random.Range(0, rockPatterns.Length);
            Instantiate(rockPatterns[rand], transform.position, Quaternion.identity);
            timeBetweenSpawn = startTimeBetweenSpawn;
            if (startTimeBetweenSpawn > minTime)
            {
                startTimeBetweenSpawn -= decreaseTime;
            }

            if (Random.Range(0, coinChance) == 1)
            {
                int rand2 = Random.Range(0, coins.Length);
                Instantiate(coins[rand2], transform.position, Quaternion.identity);
            }
        }
        else
        {
            timeBetweenSpawn -= Time.deltaTime;
        }
    }
}
